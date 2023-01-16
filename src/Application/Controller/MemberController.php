<?php

declare(strict_types=1);

namespace App\Application\Controller;

use App\Domain\Model\Member;
use App\Domain\Services\MemberManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MemberController
{
    public function __construct(private MemberManager $memberManager){}

    public function add(Request $request): JsonResponse
    {
        $id = Uuid::uuid4()->__toString();
        $member = new Member($id, 'Samer', 's@test.com', '');
        
        $this->memberManager->create(
            id: $member->id(),
            name: $member->name(),
            email: $member->email(),
            password: $member->password()
        );
        
        return new JsonResponse(
            [
                'member' => [
                    'id' => $member->id(),
                    'name' => $member->name(),
                    'email' => $member->email(),
                    'password' => $member->password()
                ]
            ]
        );
    }

    public function find(Request $request): JsonResponse
    {
        $member = $this->memberManager->get($request->get('id'));
        if (!$member) {
            return new JsonResponse([], JsonResponse::HTTP_NOT_FOUND);
        }
        return new JsonResponse(
            [
                'member' => [
                    'id' => $member->id(),
                    'name' => $member->name(),
                    'email' => $member->email(),
                    'password' => $member->password()
                ]
            ]
        );
    }
}
