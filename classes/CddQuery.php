<?php
/* This file is part of a copyrighted work; it is distributed with NO WARRANTY.
 * See the file COPYRIGHT.html for more details.
 */
require_once("../shared/global_constants.php");
require_once("../classes/Cdd.php");
require_once("../classes/Query.php");
require_once("../classes/Settings.php");
require_once("../classes/SettingsQuery.php");

/******************************************************************************
 * MemberQuery data access component for library members
 *
 * @author David Stevens <dave@stevens.name>;
 * @version 1.0
 * @access public
 ******************************************************************************
*/

class MemberQuery extends Query {
  var $_itemsPerPage = 100;
  var $_rowNmbr = 0;
  var $_currentRowNmbr = 0;
  var $_currentPageNmbr = 0;
  var $_rowCount = 0;
  var $_pageCount = 0;

  function setItemsPerPage($value) {
    $this->_itemsPerPage = $value;
  }
  function getCurrentRowNmbr() {
    return $this->_currentRowNmbr;
  }
  function getRowCount() {
    return $this->_rowCount;
  }
  function getPageCount() {
    return $this->_pageCount;
  }

  /****************************************************************************
   * Executes a query
   * @param string $type one of the global constants
   *               OBIB_SEARCH_BARCODE or OBIB_SEARCH_NAME
   * @param string $word String to search for
   * @param integer $page What page should be returned if results are more than one page
   * @access public
   ****************************************************************************
   */
  function execSearch($type, $word, $page) {
echo "<br/> type   " .   $type; 	
  	
    # reset stats
    $this->_rowNmbr = 0;
    $this->_currentRowNmbr = 0;
    $this->_currentPageNmbr = $page;
    $this->_rowCount = 0;
    $this->_pageCount = 0;

    # Building sql statements
switch ($type) {
    case OBIB_SEARCH_CDD_CLV:
    $col = "Cdd_Clave";
        break;
    case OBIB_SEARCH_CDD_NUM:
    $col = "Cdd_Numero";
        break;
    case OBIB_SEARCH_CDD_DES:
    $col = "cdd_Descripcion";
        break;
}

    # Building sql statements
    $sql = $this->mkSQL("from cdd where %C like %Q ", $col, "%" . $word. "%");
    $sqlcount = "select count(*) as rowcount ".$sql;
    $sql = "select * ".$sql;
    $sql .= " order by cdd_Numero, cdd_Descripcion";
    # setting limit so we can page through the results
    $offset = ($page - 1) * $this->_itemsPerPage;
    $limit = $this->_itemsPerPage;
    $sql .= $this->mkSQL(" limit %N, %N ", $offset, $limit);
#echo "sql=[".$sql."]<br>\n";
    # Running row count sql statement
    $rows = $this->exec($sqlcount);
    if (count($rows) != 1) {
      Fatal::internalError("Wrong number of count rows");
    }
    # Calculate stats based on row count
    $this->_rowCount = $rows[0]["rowcount"];
    $this->_pageCount = ceil($this->_rowCount / $this->_itemsPerPage);

    # Running search sql statement
    $this->_exec($sql);
  }

  /****************************************************************************
   * Executes a query
   * @param string $mbrid Member id of library member to select
   * @return boolean returns false, if error occurs
   * @access public
   ****************************************************************************
   */
  function get($mbrid) {
    $sql = $this->mkSQL("select cdd.* from cdd "
                        . "LIMIT %N ", 100);
    $rows = $this->exec($sql);
    if (count($rows) != 1) {
      Fatal::internalError("Bad mbrid");
    }
    echo "sql=[".$sql."]<br>\n";
    return $this->_mkObj($rows[0]);
  }

  /****************************************************************************
   * Fetches a row from the query result and populates the Member object.
   * @return Member returns library member or false if no more members to fetch
   * @access public
   ****************************************************************************
   */

  function fetchMember() {
    $array = $this->_conn->fetchRow();
    if ($array == false) {
      return false;
    }
    # increment rowNmbr
    $this->_rowNmbr = $this->_rowNmbr + 1;
    $this->_currentRowNmbr = $this->_rowNmbr + (($this->_currentPageNmbr - 1) * $this->_itemsPerPage);
    return $this->_mkObj($array);
  }
  
  function _mkObj($array) {
    $mbr = new Member();
    $mbr->setCdd_Bid($array["cdd_Bid"]);
    $mbr->setCdd_Numero($array["cdd_Numero"]);
    $mbr->setCdd_Descripcion($array["cdd_Descripcion"]);
    $mbr->setCdd_Clave($array["cdd_Clave"]);
    $mbr->setCdd_Table($array["cdd_Table"]);
    return $mbr;
  }
}
?>