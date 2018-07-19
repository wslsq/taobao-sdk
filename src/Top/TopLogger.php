<?php
namespace Flofire\TaobaoSDK\Top;

use Flofire\TaobaoSDK\Config\Config;

class TopLogger
{
    public $conf = [
        'separator' => "\t",
        'log_file'  => '',
    ];

    private $fileHandle;

    /**
     * 获取文件处理
     *
     * @return mixed
     */
    protected function getFileHandle()
    {
        if (null === $this->fileHandle) {
            /** 是否设置 log_file */
            if (empty($this->conf['log_file'])) {
                $this->conf['log_file'] = (new Config())->getLogFilePath();
            }

            $logDir = dirname($this->conf['log_file']);

            /** 创建目录 */
            if (!is_dir($logDir)) {
                mkdir($logDir, 0777, true);
            }

            $this->fileHandle = fopen($this->conf["log_file"], "a");
        }

        return $this->fileHandle;
    }

    /**
     * 写入 log
     *
     * @param $logData
     * @return bool
     */
    public function log($logData)
    {
        if ('' == $logData || [ ] == $logData) {
            return false;
        }

        /** 数组 */
        if (is_array($logData)) {
            $logData = implode($this->conf['separator'], $logData);
        }

        fwrite($this->getFileHandle(), $logData . "\n");
    }
}