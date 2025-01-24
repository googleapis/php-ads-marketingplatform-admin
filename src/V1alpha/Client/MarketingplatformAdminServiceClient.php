<?php
/*
 * Copyright 2024 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/marketingplatform/admin/v1alpha/marketingplatform_admin.proto
 * Updates to the above are reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Ads\MarketingPlatform\Admin\V1alpha\Client;

use Google\Ads\MarketingPlatform\Admin\V1alpha\AnalyticsAccountLink;
use Google\Ads\MarketingPlatform\Admin\V1alpha\CreateAnalyticsAccountLinkRequest;
use Google\Ads\MarketingPlatform\Admin\V1alpha\DeleteAnalyticsAccountLinkRequest;
use Google\Ads\MarketingPlatform\Admin\V1alpha\GetOrganizationRequest;
use Google\Ads\MarketingPlatform\Admin\V1alpha\ListAnalyticsAccountLinksRequest;
use Google\Ads\MarketingPlatform\Admin\V1alpha\Organization;
use Google\Ads\MarketingPlatform\Admin\V1alpha\SetPropertyServiceLevelRequest;
use Google\Ads\MarketingPlatform\Admin\V1alpha\SetPropertyServiceLevelResponse;
use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\LoggerInterface;

/**
 * Service Description: Service Interface for the Google Marketing Platform Admin API.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @experimental
 *
 * @method PromiseInterface<AnalyticsAccountLink> createAnalyticsAccountLinkAsync(CreateAnalyticsAccountLinkRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<void> deleteAnalyticsAccountLinkAsync(DeleteAnalyticsAccountLinkRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Organization> getOrganizationAsync(GetOrganizationRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PagedListResponse> listAnalyticsAccountLinksAsync(ListAnalyticsAccountLinksRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<SetPropertyServiceLevelResponse> setPropertyServiceLevelAsync(SetPropertyServiceLevelRequest $request, array $optionalArgs = [])
 */
final class MarketingplatformAdminServiceClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.marketingplatform.admin.v1alpha.MarketingplatformAdminService';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'marketingplatformadmin.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'marketingplatformadmin.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/marketingplatformadmin.analytics.read',
        'https://www.googleapis.com/auth/marketingplatformadmin.analytics.update',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/marketingplatform_admin_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/marketingplatform_admin_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/marketingplatform_admin_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' =>
                        __DIR__ . '/../resources/marketingplatform_admin_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a account
     * resource.
     *
     * @param string $account
     *
     * @return string The formatted account resource.
     *
     * @experimental
     */
    public static function accountName(string $account): string
    {
        return self::getPathTemplate('account')->render([
            'account' => $account,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * analytics_account_link resource.
     *
     * @param string $organization
     * @param string $analyticsAccountLink
     *
     * @return string The formatted analytics_account_link resource.
     *
     * @experimental
     */
    public static function analyticsAccountLinkName(string $organization, string $analyticsAccountLink): string
    {
        return self::getPathTemplate('analyticsAccountLink')->render([
            'organization' => $organization,
            'analytics_account_link' => $analyticsAccountLink,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a organization
     * resource.
     *
     * @param string $organization
     *
     * @return string The formatted organization resource.
     *
     * @experimental
     */
    public static function organizationName(string $organization): string
    {
        return self::getPathTemplate('organization')->render([
            'organization' => $organization,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a property
     * resource.
     *
     * @param string $property
     *
     * @return string The formatted property resource.
     *
     * @experimental
     */
    public static function propertyName(string $property): string
    {
        return self::getPathTemplate('property')->render([
            'property' => $property,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - account: accounts/{account}
     * - analyticsAccountLink: organizations/{organization}/analyticsAccountLinks/{analytics_account_link}
     * - organization: organizations/{organization}
     * - property: properties/{property}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string  $formattedName The formatted name string
     * @param ?string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     *
     * @experimental
     */
    public static function parseName(string $formattedName, ?string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'marketingplatformadmin.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *           *Important*: If you accept a credential configuration (credential
     *           JSON/File/Stream) from an external source for authentication to Google Cloud
     *           Platform, you must validate it before providing it to any Google API or library.
     *           Providing an unvalidated credential configuration to Google APIs can compromise
     *           the security of your systems and data. For more information {@see
     *           https://cloud.google.com/docs/authentication/external/externally-sourced-credentials}
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     *     @type false|LoggerInterface $logger
     *           A PSR-3 compliant logger. If set to false, logging is disabled, ignoring the
     *           'GOOGLE_SDK_PHP_LOGGING' environment flag
     * }
     *
     * @throws ValidationException
     *
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Creates the link between the Analytics account and the Google Marketing
     * Platform organization.
     *
     * User needs to be an org user, and admin on the Analytics account to create
     * the link. If the account is already linked to an organization, user needs
     * to unlink the account from the current organization, then try link again.
     *
     * The async variant is
     * {@see MarketingplatformAdminServiceClient::createAnalyticsAccountLinkAsync()} .
     *
     * @example samples/V1alpha/MarketingplatformAdminServiceClient/create_analytics_account_link.php
     *
     * @param CreateAnalyticsAccountLinkRequest $request     A request to house fields associated with the call.
     * @param array                             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return AnalyticsAccountLink
     *
     * @throws ApiException Thrown if the API call fails.
     *
     * @experimental
     */
    public function createAnalyticsAccountLink(
        CreateAnalyticsAccountLinkRequest $request,
        array $callOptions = []
    ): AnalyticsAccountLink {
        return $this->startApiCall('CreateAnalyticsAccountLink', $request, $callOptions)->wait();
    }

    /**
     * Deletes the AnalyticsAccountLink, which detaches the Analytics account from
     * the Google Marketing Platform organization.
     *
     * User needs to be an org user, and admin on the Analytics account in order
     * to delete the link.
     *
     * The async variant is
     * {@see MarketingplatformAdminServiceClient::deleteAnalyticsAccountLinkAsync()} .
     *
     * @example samples/V1alpha/MarketingplatformAdminServiceClient/delete_analytics_account_link.php
     *
     * @param DeleteAnalyticsAccountLinkRequest $request     A request to house fields associated with the call.
     * @param array                             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     *
     * @experimental
     */
    public function deleteAnalyticsAccountLink(
        DeleteAnalyticsAccountLinkRequest $request,
        array $callOptions = []
    ): void {
        $this->startApiCall('DeleteAnalyticsAccountLink', $request, $callOptions)->wait();
    }

    /**
     * Lookup for a single organization.
     *
     * The async variant is
     * {@see MarketingplatformAdminServiceClient::getOrganizationAsync()} .
     *
     * @example samples/V1alpha/MarketingplatformAdminServiceClient/get_organization.php
     *
     * @param GetOrganizationRequest $request     A request to house fields associated with the call.
     * @param array                  $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Organization
     *
     * @throws ApiException Thrown if the API call fails.
     *
     * @experimental
     */
    public function getOrganization(GetOrganizationRequest $request, array $callOptions = []): Organization
    {
        return $this->startApiCall('GetOrganization', $request, $callOptions)->wait();
    }

    /**
     * Lists the Google Analytics accounts link to the specified Google Marketing
     * Platform organization.
     *
     * The async variant is
     * {@see MarketingplatformAdminServiceClient::listAnalyticsAccountLinksAsync()} .
     *
     * @example samples/V1alpha/MarketingplatformAdminServiceClient/list_analytics_account_links.php
     *
     * @param ListAnalyticsAccountLinksRequest $request     A request to house fields associated with the call.
     * @param array                            $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     *
     * @experimental
     */
    public function listAnalyticsAccountLinks(
        ListAnalyticsAccountLinksRequest $request,
        array $callOptions = []
    ): PagedListResponse {
        return $this->startApiCall('ListAnalyticsAccountLinks', $request, $callOptions);
    }

    /**
     * Updates the service level for an Analytics property.
     *
     * The async variant is
     * {@see MarketingplatformAdminServiceClient::setPropertyServiceLevelAsync()} .
     *
     * @example samples/V1alpha/MarketingplatformAdminServiceClient/set_property_service_level.php
     *
     * @param SetPropertyServiceLevelRequest $request     A request to house fields associated with the call.
     * @param array                          $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return SetPropertyServiceLevelResponse
     *
     * @throws ApiException Thrown if the API call fails.
     *
     * @experimental
     */
    public function setPropertyServiceLevel(
        SetPropertyServiceLevelRequest $request,
        array $callOptions = []
    ): SetPropertyServiceLevelResponse {
        return $this->startApiCall('SetPropertyServiceLevel', $request, $callOptions)->wait();
    }
}
