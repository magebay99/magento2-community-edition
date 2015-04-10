<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Update\Queue;

use Magento\Update\Backup\BackupInfo;
use \Magento\Update\Backup;

/**
 * Magento updater application 'backup' job.
 */
class JobBackup extends AbstractJob
{
    /** @var \Magento\Update\Backup\BackupInfo */
    protected $backupInfo;

    /**
     * Initialize job instance.
     *
     * @param string $name
     * @param array $params
     * @param \Magento\Update\Status|null $status
     * @param \Magento\Update\Backup\BackupInfo|null $backupInfo
     */
    public function __construct($name, array $params, \Magento\Update\Status $status = null, $backupInfo = null)
    {
        parent::__construct($name, $params, $status);
        $backupInfo = $backupInfo ? $backupInfo : new BackupInfo();
        $this->backup = new Backup($backupInfo);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $this->backup->execute();
        return $this;
    }
}
