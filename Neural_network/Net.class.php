<?php
include_once("/Neuron.class.php");

class Net {
    private $m_layers = []; // this->m_layers[layernum][neuronNum]
    private $m_error;
    private $m_recentAverageError;
    private $m_recentAverageSmoothingFactor = 0;

    public function __construct() {
    }

    public function create($topology) {
    	$numLayers = count($topology);

    	for ($i = 0; $i < $numLayers; $i++) {
    		array_push($this->m_layers, []);
    		$numOutputs = $i == count($topology) - 1 ? 0 : $topology[$i + 1];

    		// Add the neurons to the layer, <= because we need the bias neuron
    		for ($j = 0; $j <= $topology[$i]; $j++) {
    			array_push($this->m_layers[count($this->m_layers) - 1], new Neuron($numOutputs, $j));
    			// echo "A new Neuron created <br>";
    		}
    		// echo "<br>";

    		// Force the bias node's output value to 1.0
    		end($this->m_layers[count($this->m_layers) - 1])->setOutputVal(1.0); // get last neuron of last layer in array AKA the bias neuron
    	}
    }

    // Import net from file
    public function import($fileName) {
        $this->m_layers = [];

        // Get json from file and decode
        try {
            $raw_data = file_get_contents($fileName . '.json');
            $layers = json_decode($raw_data, true);
        } catch (Exception $e) {
            echo "Import FAILED <br>" . $e;
            return false;
        }

        // Create new net with neurons from the file
        for ($i = 0; $i < count($layers); $i++) {
    		array_push($this->m_layers, []);

            //NOTE: We don't need to create a bias because it is in the file
            // Add the neurons to the layer
    		for ($j = 0; $j < count($layers[$i]); $j++) {
                $cur = $layers[$i][$j];
                // 0 numOutputsWeights because we take te array from the file
                $neuron = new Neuron(0, $cur['m_index'], $cur['m_outputval'], $cur['m_gradient'], $cur['m_outputWeights']);
    			array_push($this->m_layers[count($this->m_layers) - 1], $neuron);
    			// echo "Neuron added <br>";
    		}
    		// echo "<br>";
        }
    }

    // Export net to file
    public function export($fileName) {
        try {
            $fp = fopen('nets/' . $fileName . '.json', 'w');
            fwrite($fp, json_encode($this->m_layers, JSON_PRETTY_PRINT));
            fclose($fp);
        } catch (Exception $e) {
            echo "Export FAILED <br>" . $e;
        }
    }

    public function getResults() {
        $result = [];

        for ($i = 0; $i < count(end($this->m_layers)) - 1; $i++) { // Exclude bias
            array_push($result, end($this->m_layers)[$i]->getOutputVal());
        }

        return $result;
    }

    public function feedForward($inputVals) {
    	// First layer equals input layer
    	assert(count($inputVals) == count($this->m_layers[0]) - 1); // Exclude bias Neuron

    	for ($i = 0; $i < count($inputVals); $i++) {
    		$this->m_layers[0][$i]->setOutputVal($inputVals[$i]);
    	}

    	// Forward propagation
    	for ($i = 1; $i < count($this->m_layers); $i++) { // Skip the input layer
    		$prevLayer = $this->m_layers[$i - 1];

    		for ($j = 0; $j < count($this->m_layers[$i]) - 1; $j++) { // Exlude bias
    			$this->m_layers[$i][$j]->feedForward($prevLayer);
    		}
    	}
    }

    public function backProp($targetVals) {
    	/* Calculate overall net error (RMS of output neuron errors) */

    	$outputLayer = end($this->m_layers);
    	$this->m_error = 0.0;

    	for ($i = 0; $i < count($outputLayer) - 1; $i++) { // Exclude bias
            $delta = $targetVals[$i] - $outputLayer[$i]->getOutputVal();

    		$this->m_error += $delta * $delta;
    	}

    	$this->m_error /= count($outputLayer) - 1; // get avarage error squared
    	$this->m_error = sqrt($this->m_error); // RMS


    	/* Implement a recent avarage measurement */
    	$this->m_recentAverageError = ($this->m_recentAverageError * $this->m_recentAverageSmoothingFactor + $this->m_error) / ($this->m_recentAverageSmoothingFactor + 1.0);


    	/* Calculate output layer gradients */

    	for ($i = 0; $i < count($outputLayer) - 1; $i++) { // Exclude bias
    		$outputLayer[$i]->calcOutputGradients($targetVals[$i]);
    	}

        $this->m_layer[count($this->m_layers) - 1] = $outputLayer;


    	/* Calculate gradients on hidden layers */

    	// For every hidden layer from back to front
    	for ($i = count($this->m_layers) - 2; $i > 0; $i--) {
    		$currentLayer = $this->m_layers[$i];
    		$nextLayer = $this->m_layers[$i + 1];

    		for ($j = 0; $j < count($currentLayer); $j++) {
    			$currentLayer[$j]->calcHiddenGradients($nextLayer);
    		}

            $this->m_layers[$i] = $currentLayer;
    	}


    	// For all layers from outputs to first hidden layer
    	// update connection weights

    	for ($i = count($this->m_layers) - 1; $i > 0; $i--) {
    		$layer = $this->m_layers[$i];
    		$prevLayer = $this->m_layers[$i - 1];

    		for ($j = 0; $j < count($layer) - 1; $j++) { // Exclude bias
    			$this->m_layers[$i - 1] = $layer[$j]->updateInputWeights($prevLayer);
    		}

            $this->m_layers[$i] = $layer;
    	}
    }
}
