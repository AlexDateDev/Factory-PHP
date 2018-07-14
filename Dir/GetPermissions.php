<?php
// ----------------------------------------------------------------------------
// GetPermissions
//
//
//
// Date : 26/06/2013
// By   : Type here your name or nickname.
// ----------------------------------------------------------------------------
?>

<?php
/**
     * Symbolic Permissions
     *
     * Takes a numeric value representing a file's permissions and returns
     * standard symbolic notation representing that value
     *
     * @access    public
     * @param    int
     * @return    string
     */
    function symbolic_permissions($perms)
    {
        if (($perms & 0xC000) == 0xC000)
        {
            $symbolic = 's'; // Socket
        }
        elseif (($perms & 0xA000) == 0xA000)
        {
            $symbolic = 'l'; // Symbolic Link
        }
        elseif (($perms & 0x8000) == 0x8000)
        {
            $symbolic = '-'; // Regular
        }
        elseif (($perms & 0x6000) == 0x6000)
        {
            $symbolic = 'b'; // Block special      
        }
        elseif (($perms & 0x4000) == 0x4000)
        {
            $symbolic = 'd'; // Directory
        }
        elseif (($perms & 0x2000) == 0x2000)
        {
            $symbolic = 'c'; // Character special
        }
        elseif (($perms & 0x1000) == 0x1000)
        {
            $symbolic = 'p'; // FIFO pipe
        }
        else
        {
            $symbolic = 'u'; // Unknown
        }

        // Owner
        $symbolic .= (($perms & 0x0100) ? 'r' : '-');
        $symbolic .= (($perms & 0x0080) ? 'w' : '-');
        $symbolic .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));

        // Group
        $symbolic .= (($perms & 0x0020) ? 'r' : '-');
        $symbolic .= (($perms & 0x0010) ? 'w' : '-');
        $symbolic .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));

        // World
        $symbolic .= (($perms & 0x0004) ? 'r' : '-');
        $symbolic .= (($perms & 0x0002) ? 'w' : '-');
        $symbolic .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));

        return $symbolic;
    }
?>
