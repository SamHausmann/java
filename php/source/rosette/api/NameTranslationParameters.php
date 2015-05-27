<?php
/**
 * class NameTranslationParameters
 *
 * Parameters that are necessary for name translation operations.
 *
 * @copyright 2014-2015 Basis Technology Corporation.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at
 *
 * @license http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software distributed under the License is
 * distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and limitations under the License.
 **/
namespace rosette\api;

/**
 * Class RNTParameters
 * @package rosette\api
 */
class NameTranslationParameters extends RosetteParamsSetBase
{
    /**
     * constructor
     */
    public function __construct()
    {
        parent::__construct(['name', 'targetLanguage', 'entityType', 'sourceLanguageOfOrigin',
            'sourceLanguageOfUse', 'sourceScript', 'targetScript', 'targetScheme']);
    }

    /**
     * Returns the serialized form of the parameters.
     * @return array
     * @throws RosetteException
     */
    public function serializable()
    {
        foreach (['name', 'targetLanguage'] as $key) {
            if ($this->Get($key) == null) {
                throw new RosetteException(
                    sprintf("Required RNT parameter not supplied: %s", $key),
                    RosetteException::$BAD_REQUEST_FORMAT
                );
            }
        }

        return $this->ForSerialize();
    }
}