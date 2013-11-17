<?php
/**
 * BestSiteAd model
 * This class is used to communicate with the database.
 * @author Loc Dang, Tung Dang, Khanh Nguyen
 *
 */
class Model 
{
    private $db;
    
    /**
     * Constructor
     */
    function __construct() 
    {
        $this->db = @mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('Could not connect to MySQL:'.mysqli_connect_error($this->db));
        mysqli_set_charset($this->db, 'uft8');
    }
    
    /**
     * Gets a random ad from Ads table
     * @return an associated array containing adID, title, url, description.
     */
    function getRandomAd() 
    {
        $query = "select * from Ads order by rand() limit 1";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    
    /**
     * Gets an ad from Ads table
     * @param id the id of the poem
     * @return an associated array containing adID, title, url, description.
     */
    function getAnAd($id) 
    {
        $query = "select * from Ads where adID = $id";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    /**
     * Gets all ads from Ads table
     * @param id the id of the poem
     * @return an associated array containing adID, title, url, description.
     */
    function getAds() 
    {
        $query = "select * from Ads ORDER BY adID;";
        $result = mysqli_query($this->db, $query);
        
        //Get the IDs of the top ten in descending order
        $topIDs = array(); 
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $topIDs[] = $row['adID'];
        }
        $ads = array();
        foreach ($topIDs as $index => $value){
            $ad = $this->getAnAd($value);
            $ads[] = $ad;
        }
        return $ads;
        
    }
    /**
    * Delete an ad
    * @param $adID ID of the ad
    * @return true if success; ortherwise, return false
    */
    function deleteAd($adID)
    {
        $query = "DELETE FROM Ads WHERE adID=$adID;";
        if (mysqli_query($this->db, $query)) {
            return true;
        }
        else return false;
    }
    /**
    * Add a ad
    * @param $title ad title
    * @param $url ad url
    * @param $description ad description
    * @return true if success; ortherwise, return false
    */
    function addAd($title, $url, $description)
    {
        $query = "INSERT INTO Ads(title,url,description) VALUES('$title','$url','$description');";
        if (mysqli_query($this->db, $query)) {
            return true;
        }
        else return false;
    }
    /**
    * Get number of clicks for an add
    * @param $adID ID of the ad
    * @return number of clicks for certain ad
    */
    function getCounter($adID)
    {
        $query = "select * from Counter where adID = $adID";
        $result = mysqli_query($this->db, $query);
        $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $array['count'];
    }
    /**
    * Reset counter 
    * @return true if success; ortherwise, return false
    */
    function resetCounter()
    {
        $query = "UPDATE Counter SET count=0 WHERE count<>0;";
        if (mysqli_query($this->db, $query)) {
            return true;
        }
        else return false;
    }
}
?>
