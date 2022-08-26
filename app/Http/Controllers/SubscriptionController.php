<?php

namespace App\Http\Controllers;

use App\Actions\Subscription\WebsiteSubscriber;
use App\Http\Requests\SubscriptionRequest;
use App\Repositories\SubscriberRepository;
use App\Repositories\WebsiteRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * @param  WebsiteSubscriber  $subscriber
     */
    public function __construct(private WebsiteSubscriber $subscriber, private SubscriberRepository $subscriberRepository, private WebsiteRepository $websiteRepository)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SubscriptionRequest  $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(SubscriptionRequest $request): JsonResponse
    {
        $website = $this->websiteRepository->getWebsite(['name'=> $request->get('website')]);

        $subscriber = $this->subscriberRepository->getSubscriber(['email'=>$request->get('email')], true);


        if($website && $subscriber){
            try {
                $this->subscriber->subscribe($website, $subscriber);
            }catch(Exception $e)
            {
                \Log::error($e);
                return response()->json(['message' => 'Something went wrong']);
            }

            return response()->json(['message' => 'Ok']);
        }

        abort(404);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  SubscriptionRequest  $request
     * @return JsonResponse|void
     */
    public function destroy(SubscriptionRequest $request)
    {
        $website = $this->websiteRepository->getWebsite(['name'=> $request->get('website')]);

        $subscriber = $this->subscriberRepository->getSubscriber(['email'=>$request->get('email')], true);


        if($website && $subscriber){
            try {
                $this->subscriber->unsubscribe($website, $subscriber);
            }catch(Exception $e)
            {
                \Log::error($e);
                return response()->json(['message' => 'Something went wrong']);
            }

            return response()->json(['message' => 'Ok']);
        }

        abort(404);
    }
}
