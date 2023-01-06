<?php

namespace Emagineurs\EXcellent\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

if (!empty($GLOBALS['TYPO3_CONF_VARS']['EXT']['e_xcellent']['ExtendedModel']['Organization'])) {

    foreach ($GLOBALS['TYPO3_CONF_VARS']['EXT']['e_xcellent']['ExtendedModel']['Organization'] as $currentPathToAdditionalModel) {

        if (file_exists(GeneralUtility::getFileAbsFileName($currentPathToAdditionalModel))) {

            require_once(GeneralUtility::getFileAbsFileName($currentPathToAdditionalModel));

        }
    }
}

class Organization extends AbstractEntity
{
    protected $name;
   
    protected $address;
   
    protected $telephone_number;
   
    protected $telefax;
   
    protected $url;
   
    protected $email_adress;
   
    protected $description;
   
    protected $image;

    protected $contacts;
   
    protected $offers;
   
    protected $administrator;
   /**

     * __construct

     *

     * @return Cms

     */

    public function __construct()

    {

        //Do not remove the next line: It would break the functionality

        $this->initStorageObjects();

    }

    /**

     * Initializes all ObjectStorage properties.

     *

     * @return void

     */

    protected function initStorageObjects() {

        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();

   }

   public function setName(string $name): void
   {
       $this->name = $name;
   }

   public function getName(): string
   {
       return $this->name;
   }

   public function setAddress(string $address): void
   {
       $this->name = $address;
   }

   public function getAddress(): string
   {
       return $this->address;
   }
   
   public function setTelephoneNumber(string $telephone_number): void
   {
       $this->name = $telephone_number;
   }

   public function getTelephoneNumber(): string
   {
       return $this->telephone_number;
   }

   public function setTelefax(string $telefax): void
   {
       $this->name = $telefax;
   }

   public function getTelefax(): string
   {
       return $this->telefax;
   }

   public function setUrl(string $url): void
   {
       $this->name = $url;
   }

   public function getUrl(): string
   {
       return $this->url;
   }

   public function setEmailAddress(string $email_adress): void
   {
       $this->name = $email_adress;
   }

   public function getEmailAddress(): string
   {
       return $this->email_adress;
   }

   public function setDescription(string $description): void
   {
       $this->name = $description;
   }

   public function getDescription(): string
   {
       return $this->description;
   }

   public function setImage(string $image): void
   {
       $this->name = $image;
   }

   public function getImage(): string
   {
       return $this->image;
   }

   public function setContacts(string $contacts): void
   {
       $this->name = $contacts;
   }

   public function getContacts(): string
   {
       return $this->contacts;
   }

   public function setOffers(string $offers): void
   {
       $this->name = $offers;
   }

   public function getOffers(): string
   {
       return $this->offers;
   }

   public function setAdministrator(string $administrator): void
   {
       $this->name = $administrator;
   }

   public function getAdministrator(): string
   {
       return $this->administrator;
   }
}

