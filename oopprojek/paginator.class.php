<?php
 
class Paginator {
 
     private $_conn;
        private $_limit;
        private $_page;
        private $_query;
        private $_total;
 
    public function __construct( $conn, $query) {
     
        $this->_conn = $conn;

        $this->_query = $query;
        $rs = $this->_conn->query($query);
        $this->_total = $rs->rowCount();
    }
    
    public function getData( $page = 1 ,$limit = 10) {
     
        $this->_limit   = $limit;
        $this->_page    = $page;

        $query          = $this->_query . " LIMIT " . ( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit";
        $rs             = $this->_conn->query( $query );
        
        $result         = new stdClass();
        $result->page   = $this->_page;
        $result->limit  = $this->_limit;
        $result->total  = $this->_total;
        $result->data   = $rs;
        $result->q   = $query;


        return $result;
    }
    
    public function createLinks( $links) {
        if ( $this->_limit == 'all' ) {
            return '';
        }

        $last       = ceil( $this->_total / $this->_limit );

        $start      = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
        $end        = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;

        $html       = '<ul class="pagination">';

        $class      = ( $this->_page == 1 ) ? "disabled" : "";
        $html       .= '<li class="page-first ' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';

        if ( $start > 1 ) {
            $html   .= '<li class="page-number"><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
            $html   .= '<li class="page-number disabled"><span>...</span></li>';
        }

        for ( $i = $start ; $i <= $end; $i++ ) {
            $class  = ( $this->_page == $i ) ? "active" : "";
            $html   .= '<li class="page-number ' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
        }

        if ( $end < $last ) {
            $html   .= '<li class="page-number disabled"><span>...</span></li>';
            $html   .= '<li class="page-number"><a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
        }

        $class      = ( $this->_page == $last ) ? "disabled" : "";
        $html       .= '<li class="page-number ' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 ) . '">&raquo;</a></li>';

        $html       .= '</ul>';

        return $html;
    }

}