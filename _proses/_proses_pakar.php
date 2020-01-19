<?php
class Rangking{
	
	private $conn;
	private $table_name = "pakar";
	
	public $ia;
        
	public $ik1;
	public $ik2;
	public $ik3;
	public $ik4;
	public $ik5;
	public $ik6;
	
        public $n1;
        public $n2;
        public $n3;
        public $n4;
        public $n5;
        public $n6;
        
	public $nn2;
	public $nn3;
	public $mnr1;
	public $mnr2;
	public $has;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
            
		$query = "insert into ".$this->table_name." values(?,?,?,'',''),"
                        . "                                       (?,?,?,'',''),"
                        . "                                       (?,?,?,'',''),"
                        . "                                       (?,?,?,'',''),"
                        . "                                       (?,?,?,'',''),"
                        . "                                       (?,?,?,'','')";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik1);
		$stmt->bindParam(3, $this->n1);
                
                $stmt->bindParam(4, $this->ia);
		$stmt->bindParam(5, $this->ik2);
		$stmt->bindParam(6, $this->n2);
                
                $stmt->bindParam(7, $this->ia);
		$stmt->bindParam(8, $this->ik3);
		$stmt->bindParam(9, $this->n3);
                
                $stmt->bindParam(10, $this->ia);
		$stmt->bindParam(11, $this->ik4);
		$stmt->bindParam(12, $this->n4);
                
                $stmt->bindParam(13, $this->ia);
		$stmt->bindParam(14, $this->ik5);
		$stmt->bindParam(15, $this->n5);
                
                $stmt->bindParam(16, $this->ia);
		$stmt->bindParam(17, $this->ik6);
		$stmt->bindParam(18, $this->n6);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
                
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name;
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readKhusus(){

		$query = "SELECT * FROM penyakit a, gejala b, pakar c where a.kode=c.kode and b.kd_gejala=c.kd_gejala order by a.kode asc";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readR($a){

		$query = "SELECT * FROM penyakit a, gejala b, pakar c where a.kode=c.kode and b.kd_gejala=c.kd_gejala and c.kode='$a' ORDER BY a.bobot ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readMax($b){
		
		$query = "SELECT max(nilai_rangking) as mnr1 FROM " . $this->table_name . " WHERE kd_gejala='$b' LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	function readMin($b){
		
		$query = "SELECT min(nilai_rangking) as mnr2 FROM " . $this->table_name . " WHERE kd_gejala='$b' LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	
	function readHasil($a){
		
		$query = "SELECT sum(bobot_normalisasi) as bbn FROM " . $this->table_name . " WHERE kode='$a' LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE kode=? and kd_gejala=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->ia = $row['kode'];
		$this->ik = $row['kd_gejala'];
		$this->nn = $row['rangking'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					rangking = :nn
				WHERE
					kode = :ia 
				AND
					kd_gejala = :ik";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nn', $this->nn);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function normalisasi(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nilai = :nn2,
					bobot = :nn3
				WHERE
					kode = :ia 
				AND
					kd_gejala = :ik";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nn2', $this->nn2);
		$stmt->bindParam(':nn3', $this->nn3);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function hasil(){

		$query = "UPDATE 
					penyakit
				SET 
					bobot = :has
				WHERE
					kode = :ia";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':has', $this->has);
		$stmt->bindParam(':ia', $this->ia);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE kode = ? and kd_gejala = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
        
        function deleteAll(){
		
		$query = "DELETE FROM " . $this->table_name . "";

		$stmt = $this->conn->prepare( $query );
		
                if($stmt->execute()){;
        		return true;
                }else{
                        return false;
                }
	}
        
    //     function readMasukan(){

	// 	$query = "SELECT * FROM masukan limit 1";
	// 	$stmt = $this->conn->prepare( $query );
	// 	$stmt->execute();
		
	// 	return $stmt;
	// }
}
?>