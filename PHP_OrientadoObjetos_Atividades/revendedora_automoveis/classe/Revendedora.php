<?php

class Revendedora{

	// atributos
	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';
	private $banco = 'revendedora_automoveis';
	private $porta = '3306';
	private $dbh;
	private $stmt;

	public function __construct(){

		//fonte de dados ou DSN contém as informações necessárias para conectar ao banco de dados.
		$dsn = 'mysql::host='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
		//opção array
		$opcoes = [
			//armazena em cache a conexão para ser reutilizada, evita a sobrecarga de uma nova conexão, resultando em um aplicativo mais rápido
			PDO::ATTR_PERSISTENT => true,
			//lança uma PDOException se ocorrer um erro
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];
		try { //tenta fazer a conexão
			//cria a instancia do PDO
			$this->dbh = new PDO($dsn, $this->usuario, $this->senha, $opcoes);		    
		} catch (PDOException $e) { //senão da erro
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
	
	//Método para Cadastrar
	public function cadastrarAutomoveis($id_automovel, $fabricante, $placa, $cor, $modelo, $portas, $ano, $preco_venda){
		//ANTES DE CADASTRAR VERIFICA SE JA TEM o id CADASTRADA
		//PRA ISSO BUSCO PELO ID DO AUTOMOVEL
		global $dbh;

		$sql = $this->dbh->prepare("SELECT id_automovel FROM automoveis WHERE id_automovel = :id_automovel");
		$sql->bindValue(":id_automovel", $id_automovel);
		$sql->execute();
		//verifica se o id veio ou não
		if ($sql->rowCount() > 0) {//id ja existe no BD
			return false;
		}else{//não foi encontrada a matricula
			$sql = $this->dbh->prepare("INSERT INTO automoveis (fabricante, placa, cor, modelo, portas, ano, preco_venda) VALUES (:fb, :placa, :cor, :ml, :pt, :ano, :pv)");
			$sql->bindValue(":fb", $fabricante);
			$sql->bindValue(":placa", $placa);
			$sql->bindValue(":cor", $cor);
			$sql->bindValue(":ml", $modelo);
			$sql->bindValue(":pt", $portas);
			$sql->bindValue(":ano", $ano);
			$sql->bindValue(":pv", $preco_venda);
			$sql->execute();
			return true; //significa que foi cadastrada
		}
	}

	public function buscarDados(){
		global $dbh;

		$result = array(); //caso esteja vazio não da nenhum erro
		$sql = $this->dbh->query("SELECT id_automovel, fabricante, placa, cor, modelo, portas, ano, preco_venda FROM automoveis ORDER BY id_automovel");
		//PDO::FETCH_ASSOC = economiza memória
		$result = $sql->fetchAll(PDO::FETCH_ASSOC); //variavel em forma de array
		return $result; //retorna a variavel
	}

	//MÉTODO PARA EXCLUIR
	public function excluirAutomovel($id_automovel)
	{//deletar pela matricula
		$sql = $this->dbh->prepare("DELETE FROM automoveis WHERE id_automovel = :id");
		//substituir
		$sql->bindValue(":id", $id_automovel);
		$sql->execute();
	}


	//MÉTODO BUSCAR DADOS DE UM ALUNO
	public function buscarDadosAutomovel($id_automovel)
	{ //passo por parametro o id
		//caso não venha os dados
		$result = array();
		$sql = $this->dbh->prepare("SELECT * FROM automoveis WHERE id_automovel = :id");
		//substituição
		$sql->bindValue(":id", $id_automovel);
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_ASSOC); //transforma a variavel
		return $result;
	}


	// ===================== DADOS TABLE FABRICANTES ============================
	//Método para Cadastrar
	public function cadastrarFabricante($fabricante, $num_carros, $preco_unitario)
	{
		//ANTES DE CADASTRAR VERIFICA SE JA TEM o id CADASTRADA
		//PRA ISSO BUSCO PELO ID DO AUTOMOVEL
		global $dbh;

		$sql = $this->dbh->prepare("SELECT fabricante FROM fabricantes WHERE fabricante = :fabricante");
		$sql->bindValue(":fabricante", $fabricante);
		$sql->execute();
		//verifica se o id veio ou não
		if ($sql->rowCount() > 0) {//id ja existe no BD
			return false;
		}else{//não foi encontrada a matricula
			$sql = $this->dbh->prepare("INSERT INTO fabricantes (fabricante, num_carros, preco_unitario) VALUES (:fabricante, :nc, :pu)");
			$sql->bindValue(":fabricante", $fabricante);
			$sql->bindValue(":nc", $num_carros);
			$sql->bindValue(":pu", $preco_unitario);
			$sql->execute();
			return true; //significa que foi cadastrada
		}
	}

	public function buscarDadosFabricantes()
	{
		global $dbh;

		$result = array(); //caso esteja vazio não da nenhum erro
		$sql = $this->dbh->query("SELECT * FROM fabricantes ORDER BY fabricante");
		//PDO::FETCH_ASSOC = economiza memória
		$result = $sql->fetchAll(PDO::FETCH_ASSOC); //variavel em forma de array
		return $result; //retorna a variavel
	}

	//MÉTODO PARA EXCLUIR
	public function excluirFabricante($fabricante)
	{//deletar pela matricula
		$sql = $this->dbh->prepare("DELETE FROM fabricantes WHERE fabricante = :fabricante");
		//substituir
		$sql->bindValue(":fabricante", $fabricante);
		$sql->execute();
	}

}
?>