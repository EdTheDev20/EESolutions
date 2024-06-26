<?php
require_once('Localizacao.php');
class Outdoor {
protected $id;
protected $tipo;
protected $localizacao;
protected $datadeinicio;
protected $datadefim;
protected $imagepath;

protected $comprovativo;
protected $estado;
protected $preco;
protected $userId;

function __construct($id="null",$tipo,$Oid="null",$provincia,$municipio,
$comuna,$datadeinicio,$datadefim,$imagepath,$estado,$preco,$comprovativo,$userId){
$this->id = $id;
$this->tipo = $tipo;
$this->localizacao = new Localizacao($Oid,$provincia,$municipio,$comuna);
$this->datadeinicio = $datadeinicio;
$this->datadefim = $datadefim;
$this->imagepath = $imagepath;
$this->comprovativo = $comprovativo;
$this->estado = $estado;
$this->preco = $preco;
$this->userId = $userId;
}

public function setUserId($x){
    $this->userId = $x;
    return $this;
}

public function getUserId(){
    return $this->userId;
}
public function setMunicipio($x){
    $this->localizacao->setMunicipio($x);
}

public function setComuna($x){
    $this->localizacao->setComuna($x);
}

public function setProvincia($x){
    $this->localizacao->setProvincia($x);
}

public function setComprovativo($x){
    $this->comprovativo = $x;
    return $this;
}

public function getComprovativo(){
    return $this->comprovativo;
}

public function getMunicipio(){
    return $this->localizacao->getMunicipio();
}

public function getComuna(){
    return $this->localizacao->getComuna();
}

public function getProvincia(){
    return $this->localizacao->getProvincia();
}

/**
 * Get the value of tipo
 */ 
public function getTipo()
{
return $this->tipo;
}

/**
 * Set the value of tipo
 *
 * @return  self
 */ 
public function setTipo($tipo)
{
$this->tipo = $tipo;

return $this;
}

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of datadeinicio
 */ 
public function getDatadeinicio()
{
return $this->datadeinicio;
}

/**
 * Set the value of datadeinicio
 *
 * @return  self
 */ 
public function setDatadeinicio($datadeinicio)
{
$this->datadeinicio = $datadeinicio;

return $this;
}

/**
 * Get the value of datadefim
 */ 
public function getDatadefim()
{
return $this->datadefim;
}

/**
 * Set the value of datadefim
 *
 * @return  self
 */ 
public function setDatadefim($datadefim)
{
$this->datadefim = $datadefim;

return $this;
}

/**
 * Get the value of imagepath
 */ 
public function getImagepath()
{
return $this->imagepath;
}

/**
 * Set the value of imagepath
 *
 * @return  self
 */ 
public function setImagepath($imagepath)
{
$this->imagepath = $imagepath;

return $this;
}

/**
 * Get the value of estado
 */ 
public function getEstado()
{
return $this->estado;
}

/**
 * Set the value of estado
 *
 * @return  self
 */ 
public function setEstado($estado)
{
$this->estado = $estado;

return $this;
}

/**
 * Get the value of preco
 */ 
public function getPreco()
{
return $this->preco;
}

/**
 * Set the value of preco
 *
 * @return  self
 */ 
public function setPreco($preco)
{
$this->preco = $preco;

return $this;
}
}

