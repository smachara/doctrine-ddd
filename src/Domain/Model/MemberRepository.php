<?php

namespace App\Domain\Model;

interface MemberRepository
{
    public function save(Member $member): void;
    public function findOneById(string $id): ?Member;
}
