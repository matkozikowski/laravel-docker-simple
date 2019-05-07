<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

/**
 * @author Mateusz Kozikowski <matkozikowski@gmail.com>
 */
class VoteService
{
    private const PREFIX_REDIS_KEY = 'votes.';

    /**
     * @param string $index
     * @return bool
     */
    public function saveVote(string $index): bool
    {
        try {
            $votes = $this->getVote($index);
            Redis::set($this->getPrefixRedis($index), ($votes + 1));

            return true;
        } catch (\Exception $ex) {
            throw new Exception('Problem with Redis', $ex->getMessage());
        }
    }

    public function getVote(string $index)
    {
        return Redis::get($this->getPrefixRedis($index)) ?? 0;
    }

    /**
     * @param string $key
     * @return string
     */
    private function getPrefixRedis($key): string
    {
        return self::PREFIX_REDIS_KEY.$key;
    }
}
