<?php

/**
 * Description of timer
 *
 * @author Tomasz Jakub Rup
 */
class Timer {

	private $startTime = null;
	private $totalTime = null;

	public function  __construct() {
		$this->start();
	}

	/**
	 * Start the timer.
	 */
	public function start() {
		if ($this->startTime === null) {
			$this->startTime = microtime(true);
		}
	}

	/**
	 * Stop the timer and calculate the amount of time between the start and now.
	 * @return float
	 */
	public function stop() {
		$current = microtime(true) - $this->startTime;
		$this->startTime = null;
		$this->totalTime += $current;

		return $current;
	}

	/**
	 * Gets the total time elapsed for all calls of this timer.
	 * @return float
	 */
	public function getElapsedTime() {
		if (null !== $this->startTime) {
			$this->stop();
		}

		return $this->totalTime;
	}

}
