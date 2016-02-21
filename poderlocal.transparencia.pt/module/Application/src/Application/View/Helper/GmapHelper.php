<?php 
namespace Application\View\Helper;
 
use GoogleMaps;
use Zend\View\Helper\AbstractHelper;
 
class GmapHelper extends AbstractHelper
{
    
 
    public function __invoke($lat,$lng)
    {
    	
        $request = new GoogleMaps\Request();
		$request->setLatLng($lat . ',' . $lng);
		$proxy = new GoogleMaps\Geocoder();
		$response = $proxy->geocode($request);
		
		return $response->rawBody['results'][0]['formatted_address'];
    }
}