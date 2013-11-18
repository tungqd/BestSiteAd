<?php
/**
 * SiteTest model
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
        $this->db = @mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('Could not connect to MySQL: '.mysqli_connect_error($this->db));
        mysqli_set_charset($this->db, 'uft8');
    }
    
    /**
     * Gets a random poem from Poem table.
     * @return an associated array containing id, title, author, content, timeSelected of a poem.
     */
    function getRandomStory() 
    {
        $query = "select * from News order by rand() limit 1";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    
    /**
     * Gets a poem from Poem table.
     * @param id the id of the poem
     * @return an associated array containing id, title, author, content, timeSelected of a poem.
     */
    function getAStory($id) 
    {
        $query = "select * from News where id = $id";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    
    /**
     * Get top ten poems with highest ratings
     * @return an array of associated arrays of ten stories
     */
    function getTenRandom() 
    {
        $query = "select id,title,content from News order by rand() limit 10";
        $result = mysqli_query($this->db, $query);
        
        //Get the IDs of the top ten in descending order
        $topIDs = array(); 
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $topIDs[] = $row['id'];
        }
        //Get the titles of the poems
        $stories = array();
        foreach ($topIDs as $index => $value){
            $story = $this->getAStory($value);
            $stories[] = $story;
        }
        return $stories;
    }
    
}
?>
