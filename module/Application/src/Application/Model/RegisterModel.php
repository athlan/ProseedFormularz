<?php
namespace Application\Model;

use Application\Model\Util\BaseGetResponseModel;

class RegisterModel extends BaseGetResponseModel
{
    public function register(array $data) {
        $config = $this->getConfigApi();
        
        $campaignName = $config['campaign_name'];
        
        $campaignId = $this->getCampaignIdByName($campaignName);
        
        if($this->checkEmailExists($data['person_email']. 's', $campaignId))
            return false;
        
        try {
            $requestData = array (
                'campaign'  => $campaignId,
                'action'	=> "insert",
                'name'		=> $data['person_email'],
                'email'     => $data['person_email'],
                'cycle_day' => '0',
                'ip'		=> $data['ip'],
                'customs' => array(
                    array(
                        "name"       => "person_firstname",
                        "content"    => $data['person_firstname']
                    ),
                    array(
                        "name"       => "person_lastname",
                        "content"    => $data['person_lastname']
                    ),
                    array(
                        "name"       => "compay_name",
                        "content"    => $data['compay_name']
                    ),
                    array(
                        "name"       => "person_position",
                        "content"    => $data['person_position']
                    ),
                    array(
                        "name"       => "person_email",
                        "content"    => $data['person_email']
                    ),
                    array(
                        "name"       => "person_phone",
                        "content"    => $data['person_phone']
                    ),
                )
            );
            
            $request = $this->getRequest();
            
//             $request->setDebug(true);
            
            $result = $request->add_contact(
                $this->getApiKey(),
                $requestData
            );
        }
        catch(\Exception $e) {
            throw new \Exception("API error: " . $e->getMessage());
        }
        
        throw new \Exception("Cannot insert email.");
    }
    
    public function checkEmailExists($email, $campaignId = null) {
        $config = $this->getConfigApi();
        
        if(null === $campaignId) {
            $campaignId = $this->getCampaignIdByName($config['campaign_name']);
        }
        
        try {
            $result = $this->getRequest()->get_contacts(
                $this->getApiKey(),
                array (
                    'campaigns' => array( $campaignId ),
                    'email' => array( 'EQUALS' => $email )
                )
            );
            
            if(is_array($result) && count($result) > 0)
                return true;
            
            return false;
        }
        catch(\Exception $e) {
        }
        
        throw new \Exception("Cannot determine email existance.");
    }
    
    public function getCampaignIdByName($campaignName) {
        try {
            $result = $this->getRequest()->get_campaigns(
                $this->getApiKey(),
                array (
                    'name' => array ( 'EQUALS' => $campaignName )
                )
            );
            
            if(is_array($result)) {
                $result = array_keys($result);
                
                if(count($result) > 0)
                    return $result[0];
            }
        }
        catch(\Exception $e) {
        }
        
        throw new \Exception("Cannot get the campaign ID.");
    }
}
