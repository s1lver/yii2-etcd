<?php

declare(strict_types=1);

namespace S1lver\Etcd\RPC;

use S1lver\Etcd\EtcdRangeResponseInterface;
use yii\base\BaseObject;

/**
 *
 * @property-read string $firstKeyValue
 */
class RangeResponse extends BaseObject implements EtcdRangeResponseInterface
{
    public array $header = [];
    public array $kvs = [];
    public int $count;

    /**
     * Get the first value for the selected key.
     * Returns the decoded value of the key, or an empty string if the value was not found.
     *
     * @return string
     */
    public function getFirstKeyValue(): string
    {
        if ([] !== $this->kvs) {
            return $this->kvs[0]['value'];
        }

        return '';
    }
}
