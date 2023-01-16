<?php

declare(strict_types=1);

namespace App\Domain\Services;
use App\Domain\Model\Member;
use App\Domain\Model\MemberRepository;

class MemberManager
{
    public function __construct(private MemberRepository $repository){}
    public function create(string $id, string $name, string $email, string $password): Member
    {
        $member = new Member($id, $name, $email, $password);
        $this->repository->save($member);
        return $member;
    }
    public function get(string $id): ?Member
    {
        return $this->repository->findOneById($id);
    }

}
