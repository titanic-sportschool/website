<?php
class Neuron implements JsonSerializable {
    private static $eta = 0.15; // [0.0..1.0] overall net training rate
    private static $alpha = 0.5; // [0.0..1.0] multiplier of last weight change (momentum)
    private static $connection = array('weight' => null, 'deltaWeight' => null); // Kind of struct
    private $m_outputval;
    private $m_gradient;
    private $m_index;
    private $m_outputWeights = [];

    public function __construct($numOutputs, $index, $outputval = 0, $gradient = 0, $outputWeights = []) {
        // Create new neuron
        if ($numOutputs > 0) {
            // Add weight and give it a random value foreach output
            for ($i = 0; $i < $numOutputs; $i++) {
                array_push($this->m_outputWeights, self::$connection);
                $this->m_outputWeights[count($this->m_outputWeights) - 1]['weight'] = $this->randomWeight();
            }
        // Import neuron
        } else {
            $this->m_outputval = $outputval;
            $this->m_gradient = $gradient;
            $this->m_outputWeights = $outputWeights;
        }

        $this->m_index = $index;
    }

    public function setOutputVal($val) {
        $this->m_outputval = $val;
    }

    public function getOutputVal() {
        return $this->m_outputval;
    }

    public function feedForward($prevLayer) {
        $sum = 0;

        // sum the previous layer's outputs (including bias)
        for ($i = 0; $i < count($prevLayer); $i++) {
            $sum += $prevLayer[$i]->m_outputval * $prevLayer[$i]->m_outputWeights[$this->m_index]['weight'];
        }

        $this->m_outputval = self::transferFunction($sum);
    }

    public function calcOutputGradients($targetVal) {
        $delta = $targetVal - $this->m_outputval;
        $this->m_gradient = $delta * self::transferFunctionDerivtive($this->m_outputval);
    }

    public function calcHiddenGradients($nextLayer) {
        $dow = $this->sumDow($nextLayer);
        $this->m_gradient = $dow * self::transferFunctionDerivtive($this->m_outputval);
    }

    public function updateInputWeights($prevLayer) {
        // The weights to be updated are in the Connection container
        // in the neurons in the preceding layernum

        for ($i = 0; $i < count($prevLayer); $i++) {
            $neuron = $prevLayer[$i];
            $oldDeltaWeight = $neuron->m_outputWeights[$this->m_index]['deltaWeight'];

            $newDeltaWeight =
    			// Individual unput, magnified by the gradient and train rate
    			self::$eta *
    			$neuron->m_outputval *
    			$this->m_gradient +
    			// Also add momentum = a fraction of the previous delta weight
    			self::$alpha *
    			$oldDeltaWeight;

            $neuron->m_outputWeights[$this->m_index]['deltaWeight'] = $newDeltaWeight;
    		$neuron->m_outputWeights[$this->m_index]['weight'] += $newDeltaWeight;
            $prevLayer[$i] = $neuron;
        }

        return $prevLayer;
    }

    private static function transferFunction($x) {
    	// tanh - output range [-1.0..1.0]
    	return tanh($x);
    }

    private static function transferFunctionDerivtive($x) {
    	// tanh derivative
    	return 1.0 - $x * $x;
    }

    private static function randomWeight() {
        return rand() / getrandmax();
    }

    private function sumDOW($nextLayer) {
    	$sum = 0;

    	// Sum the contrubutions of the errors at the nodes given
    	for ($i = 0; $i < count($nextLayer) - 1; $i++) { // Exclude bias
    		$sum += $this->m_outputWeights[$i]['weight'] * $nextLayer[$i]->m_gradient;
    	}

    	return $sum;
    }

    // Used for export functionality
    public function jsonSerialize() {
        return [
            'eta' => self::$eta,
            'alpha' => self::$alpha,
            'm_outputval' => $this->m_outputval,
            'm_gradient' => $this->m_gradient,
            'm_index' => $this->m_index,
            'm_outputWeights' => $this->m_outputWeights
        ];
    }
}
