<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\Member;
use App\Domain\Model\MemberRepository;

use Doctrine\Persistence\ManagerRegistry;

class DoctrineMemberRepository implements MemberRepository
{

    private DoctrineRepository $doctrineRepository;
    public function __construct(ManagerRegistry $registry)
    {
        $this->doctrineRepository = new DoctrineRepository($registry, Member::class);
    }

    public function save(Member $member): void
    {
        $this->doctrineRepository->persist($member);
        $this->doctrineRepository->flush($member);
    }

    public function findOneById(string $id): ?Member
    {
        return $this->doctrineRepository->find($id);
    }
}
