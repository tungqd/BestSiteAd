<!-- Submit Poem Page: Check validation before adding poem to database -->
<h1>Submit Poem - <a href=index.php>Looney Limericks</a></h1>

<form onSubmit="return doCheck();" action="index.php?c=poem" id="addNewPoem" name="addPoem" method="POST">
        <input type="hidden" name="ac" value="addPoem">
        Title: <input type="text" name="title" id="title"/><br/>
        Author: <input type="text" name="author" id="author"/><br/>
        Content: <br/>
        <textarea rows="5" cols="50" name="content" id="content"></textarea>
        <input type="submit" value="Submit"/>
</form>

<script type="text/javascript">
/**
* Javascript function doCheck() validate input when submitting new poem
* Max lengths for title and author are 30 characters.
* Max length for each line of poem is 30 characters.
* A poem needs exactly 5 lines.
*/
    function doCheck()
    {
        var x=document.getElementById("addNewPoem");
        var title = x.elements[1].value;
        var titleLength = title.length;
        var author = x.elements[2].value;
        var authorLength = author.length;
        var content = x.elements[3].value;
        
        //split string by each line and put into array
        var split = content.split('\n');
        var linesArray = [];
        for (var i = 0; i < split.length; i++)
        if (split[i]) {linesArray.push(split[i]);}

        
        
        /* Null input for title */
        if (titleLength == 0)
        {
            alert("Please enter Title.");
            return false;
        }
        
        /* Title length > 30 */ 
        else if (titleLength > 30)       
        {
            alert("Title can only contain 30 characters max!");
            return false;
        }
        
        else if (titleLength <= 30)
        {
            /* Null input for author */
            if (authorLength == 0)
            {
                alert("Please enter Author name.");
                return false;
            }
            
            /* Author length > 30 */
            else if (authorLength > 30)
            {
                alert("Author name can only contain 30 characters max!");
                return false;
            }
            
            else if (authorLength <= 30)
            {
                /* Check number of lines */
                var numOfLine = linesArray.length;
                if(numOfLine != 5)
                {
                    alert("Need 5 lines for a poem.");
                    return false;
                }
                else //five lines of poem
                {
                    /* Check length of each line of poem */
                    for (var i = 0; i < 5; i++)
                    {
                        var lineLength = linesArray[i].length;
                        if (lineLength > 30)
                        {
                            alert("Each line can only contain 30 characters.");
                            return false;
                        }
                    }
                }
            }      
        }   
        return true;
    }
</script>
