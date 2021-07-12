<?php

/**
 * InboundApi
 * PHP version 5
 *
 * @category Class
 * @package  MailchimpTransactional
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Mailchimp Transactional API
 *
 * No description provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)
 *
 * OpenAPI spec version: 1.0.30
 * Contact: apihelp@mailchimp.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.12
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace MailchimpTransactional\Api;

use MailchimpTransactional\ApiException;
use MailchimpTransactional\Configuration;
use MailchimpTransactional\HeaderSelector;
use MailchimpTransactional\ObjectSerializer;

/**
 * InboundApi Class Doc Comment
 *
 * @category Class
 * @package  MailchimpTransactional
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InboundApi
{
    protected $Configuration;

    public function __construct(Configuration $config = null)
    {
        $this->config = $config ?: new Configuration();
    }

    /**
     * Add inbound domain
     * Add an inbound domain to your account.
     */
    public function addDomain($body = [])
    {
        return $this->config->post('/inbound/add-domain', $body);
    }
    /**
     * Add mailbox route
     * Add a new mailbox route to an inbound domain.
     */
    public function addRoute($body = [])
    {
        return $this->config->post('/inbound/add-route', $body);
    }
    /**
     * Check domain settings
     * Check the MX settings for an inbound domain. The domain must have already been added with the add-domain call.
     */
    public function checkDomain($body = [])
    {
        return $this->config->post('/inbound/check-domain', $body);
    }
    /**
     * Delete inbound domain
     * Delete an inbound domain from the account. All mail will stop routing for this domain immediately.
     */
    public function deleteDomain($body = [])
    {
        return $this->config->post('/inbound/delete-domain', $body);
    }
    /**
     * Delete mailbox route
     * Delete an existing inbound mailbox route.
     */
    public function deleteRoute($body = [])
    {
        return $this->config->post('/inbound/delete-route', $body);
    }
    /**
     * List inbound domains
     * List the domains that have been configured for inbound delivery.
     */
    public function domains($body = [])
    {
        return $this->config->post('/inbound/domains', $body);
    }
    /**
     * List mailbox routes
     * List the mailbox routes defined for an inbound domain.
     */
    public function routes($body = [])
    {
        return $this->config->post('/inbound/routes', $body);
    }
    /**
     * Send mime document
     * Take a raw MIME document destined for a domain with inbound domains set up, and send it to the inbound hook exactly as if it had been sent over SMTP.
     */
    public function sendRaw($body = [])
    {
        return $this->config->post('/inbound/send-raw', $body);
    }
    /**
     * Update mailbox route
     * Update the pattern or webhook of an existing inbound mailbox route. If null is provided for any fields, the values will remain unchanged.
     */
    public function updateRoute($body = [])
    {
        return $this->config->post('/inbound/update-route', $body);
    }
}
