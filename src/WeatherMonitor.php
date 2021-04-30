<?php


class WeatherMonitor
{

    /**
     * @var TemperatureService
     */
    protected $service;

    /**
     * WeatherMonitor constructor.
     * @param TemperatureService $service
     */
    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    /**
     * @param string $start
     * @param string $end
     * @return float|int
     */
    public function getAverageTemperature(string $start, string $end)
    {
        $start_temp = $this->service->getTemperature($start);
        $end_temp = $this->service->getTemperature($end);

        return ($start_temp + $end_temp) / 2;
    }
}