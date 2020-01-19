<?php
class Alternatif{
	
	private $conn;
	private $table_name = "penyakit";
	
	public $id;
    public $kt;
    public $py;
	public $jm;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values(?,?,?,'')";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->kt);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY kode ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
        
        
	function readRank(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY bobot DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
        
        function readMinID(){
		
		$query = "SELECT min(kode) as MinID FROM " . $this->table_name . "";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
        
        function readMaxID(){
		
		$query = "SELECT max(kode) as MaxID FROM " . $this->table_name . "";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE kode=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['kode'];
		$this->kt = $row['nama_penyakit'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
                    nama_penyakit = :kt,
                    penyebab = :py,
                    bobot = :jm
				WHERE
					kode = :id";

		$stmt = $this->conn->prepare($query);

        $stmt->bindParam(':kt', $this->kt);
        $stmt->bindParam(':py', $this->py);
        $stmt->bindParam(':jm', $this->jm);
		$stmt->bindParam(':id', $this->id);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE kode = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>