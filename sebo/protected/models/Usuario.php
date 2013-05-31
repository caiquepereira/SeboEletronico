<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $id_pessoa
 * @property integer $senha_id
 * @property string $nome
 * @property string $email
 * @property integer $telefone
 *
 * The followings are the available model relations:
 * @property Senha $senha
 */
class Usuario extends CActiveRecord
{
    
    
        public static function Cadastrar($nome, $email, $telefone, $senha){

            $nomeBranco;
            $emailBranco;
            $telefoneBranco;
            $senhaBranco;
            
            if(empty($nome)){
            //    Alerta quando o campo NOME está em branco
                 $nomeBranco = true; 
            }
            if(empty($email)){
            //    Alerta quando o campo EMAIL está em branco
                  $emailBranco=true;
            }
            if(empty($telefone)){
                //    Alerta quando o campo TELEFONE está em branco
                  $telefoneBranco = true;
            }
            if(empty($senha[0])){
                //    Alerta quando o campo SENHA está em branco
                  $senhaBranco = true;
            }
            if(empty($senha[1])){
                //    Alerta quando o campo CONFIRMAÇÃO SENHA está em branco
                  $senhaBranco = true;
            }
            if(empty($nome) || empty ($email) || empty ($telefone) || empty($senha[0]) || empty($senha[1])){
                    if($nomeBranco && $emailBranco && $telefoneBranco && $senhaBranco[0] && $senhaBranco[1])
                    {
                     echo "<script> alert('Não é possível cadastrar usuario,\n
                         existem campos em branco.\\nTodos os campos devem ser preenchidos!')</script>";
                     ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if($nomeBranco && $emailBranco && $telefoneBranco && $senhaBranco[0] && !$senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos NOME, EMAIL, TELEFONE E SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if($nomeBranco && $emailBranco && $telefoneBranco && !$senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos NOME, EMAIL, TELEFONE E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if($nomeBranco && $emailBranco && !$telefoneBranco && $senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos NOME, EMAIL, SENHA E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if($nomeBranco && !$emailBranco && $telefoneBranco && $senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos NOME, TELEFONE, SENHA E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && $emailBranco && $telefoneBranco && $senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos EMAIL, TELEFONE, SENHA E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && !$emailBranco && $telefoneBranco && $senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos TELEFONE, SENHA E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && $emailBranco && !$telefoneBranco && $senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos EMAIL, SENHA E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && $emailBranco && $telefoneBranco && !$senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos EMAIL, TELEFONE E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && $emailBranco && $telefoneBranco && $senhaBranco[0] && !$senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos EMAIL, TELEFONE E SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && $emailBranco && $telefoneBranco && $senhaBranco[0] && !$senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos EMAIL, TELEFONE E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    }
            }
            
            <?php

            
            
            
            if($senha[0]===$senha[1]){
                
                $senhaFinal = $senha[1];
            
            
            $sql="INSERT INTO senha (codigo_senha) VALUES ('".$senhaFinal."')";
            $comando = Yii::app()->db->createCommand($sql);
            $comando->execute();
            
            $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaFinal."'";
            $comando2 = Yii::app()->db->createCommand($sql2);
            $id_senha = $comando2->queryRow();
            
            
            $sql3="INSERT INTO usuario (nome, email, telefone, senha_id) VALUES ('".$nome."', '".$email."', '".$telefone."','".$id_senha['id_senha']."')";
            $comando3 = Yii::app()->db->createCommand($sql3);
            $comando3->execute();
            }else{
            ?>
                <script language="Javascript">
                    alert("A confirmação da senha está diferente!");
                </script>
           <?php }?>
             <script language = "Javascript">
        window.location="<?php echo Yii::app()->request->baseUrl; ?>";
        </script>
            
        <?php }
    
    
        }
        
    
    
    
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('senha_id', 'numerical', 'integerOnly'=>true),
			array('nome, email', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pessoa, senha_id, nome, email', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'senha' => array(self::BELONGS_TO, 'Senha', 'senha_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pessoa' => 'Id Pessoa',
			'senha_id' => 'Senha',
			'nome' => 'Nome',
			'email' => 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_pessoa',$this->id_pessoa,true);
		$criteria->compare('senha_id',$this->senha_id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}