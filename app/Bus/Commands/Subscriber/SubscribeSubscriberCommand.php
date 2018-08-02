<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Commands\Subscriber;

/**
 * This is the subscribe subscriber command.
 *
 * @author James Brooks <james@alt-three.com>
 */
final class SubscribeSubscriberCommand
{
    /**
     * The subscriber email.
     *
     * @var string
     */
    public $email;

    /**
     * The subscriber sms.
     *
     * @var string
     */
    public $sms;

    /**
     * The subscriber auto verification.
     *
     * @var bool
     */
    public $verified;

    /**
     * The list of subscriptions to set the subscriber up with.
     *
     * @var array|null
     */
    public $subscriptions;

    /**
     * The validation rules.
     *
     * @var array
     */
    public $rules = [
        'email' => 'required|email',
        'sms' => 'required|string',
    ];

    /**
     * Create a new subscribe subscriber command instance.
     *
     * @param string     $email
     * @param string     $sms
     * @param bool       $verified
     * @param array|null $subscriptions
     *
     * @return void
     */
    public function __construct($email, $sms, $verified = false, $subscriptions = null)
    {
        $this->email = $email;
        $this->sms = $sms;
        $this->verified = $verified;
        $this->subscriptions = $subscriptions;
    }
}
