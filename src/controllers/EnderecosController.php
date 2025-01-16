<?php
require_once __DIR__ . '/../models/Endereco.php'; 

class EnderecosController {
    
    
    public function index() {
        $cliente_id = 1; 
        $enderecos = Endereco::listarEnderecos($cliente_id); 

        
        require_once __DIR__ . '/../views/enderecos.php'; 
    }

    
    public function delete($id) {
        
        $endereco = Endereco::findById($id); 

        
        if ($endereco->principal) {
            
            $outrosEnderecos = Endereco::findByClienteId($endereco->cliente_id);

            
            if (count($outrosEnderecos) > 1) {
                
                foreach ($outrosEnderecos as $outroEndereco) {
                    if ($outroEndereco->id !== $id) {
                        
                        $outroEndereco->principal = true;
                        $outroEndereco->save();
                        break;
                    }
                }
            } else {
                
                echo "Não é permitido excluir o único endereço do cliente.";
                exit;
            }
        }

        
        $endereco->delete();
        
        
        header('Location: /enderecos');
        exit;
    }
}

