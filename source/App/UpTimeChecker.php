<?php

declare(strict_types=1);

namespace Source\App;

class UpTimeChecker
{
    /**
     * Check Http Code of a response in a given URL
     *
     * @param string $checkUrl
     * @return void
     */
    public function check(string $checkUrl)
    {
        try {
            $request = curl_init($checkUrl);

            curl_setopt_array($request, [
                CURLOPT_HEADER => true,
                CURLOPT_NOBODY => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 10,
            ]);

            curl_exec($request);

            $httpStatusCode = curl_getinfo($request, CURLINFO_HTTP_CODE);
            
            curl_close($request);
            
            if (!$this->isASuccessHttpCode($httpStatusCode)) {
                throw new \Exception(
                    "\u{1F6A8} ATTENTION: The URL: {$checkUrl} return an status of {$httpStatusCode}",
                    $httpStatusCode,
                );
            }

            echo "HTTP CODE: {$httpStatusCode}" . PHP_EOL;
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            Messenger::sendAlertMessage($exception->getMessage());
        }
    }

    /**
     * Check if a given http status code represents success
     *
     * @param integer $httpCode
     * @return boolean
     */
    private function isASuccessHttpCode(int $httpCode): bool
    {
        if ($httpCode !== 200) {
            return false;
        }

        return true;
    }
}
