
<?php

function db_total_filas($hPortal='')
{
        if(empty($hPortal))
        {
            global $hPortal;
        }
        $row =  mysql_fetch_row(mysql_query( 'SELECT FOUND_ROWS()', $hPortal ));
        return $row[0];
}

?>	