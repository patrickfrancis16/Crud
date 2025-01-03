<?php
require_once __DIR__ . '/../models/Endereco.php'; // Incluindo a classe Endereco

class EnderecosController {
    
    // Método para listar os endereços
    public function index() {
        $cliente_id = 1; // Isso pode ser dinâmico dependendo da sua aplicação. Pode vir de uma sessão ou parâmetro de URL
        $enderecos = Endereco::listarEnderecos($cliente_id); // Chama o método para listar os endereços

        // Passa os dados para a view
        require_once __DIR__ . '/../views/enderecos.php'; // Exibe a view de endereços
    }

    // Método para excluir um endereço
    public function delete($id) {
        // Supondo que você tenha uma função para pegar o endereço pelo ID
        $endereco = Endereco::findById($id); // Método que retorna o endereço pelo ID

        // Verifica se o endereço a ser excluído é o principal
        if ($endereco->principal) {
            // Verifica se o cliente tem outros endereços
            $outrosEnderecos = Endereco::findByClienteId($endereco->cliente_id);

            // Se o cliente tem mais de um endereço, podemos marcar um outro como principal
            if (count($outrosEnderecos) > 1) {
                // Marca o próximo endereço como principal
                foreach ($outrosEnderecos as $outroEndereco) {
                    if ($outroEndereco->id !== $id) {
                        // Marca o endereço como principal
                        $outroEndereco->principal = true;
                        $outroEndereco->save();
                        break;
                    }
                }
            } else {
                // Caso contrário, não podemos excluir o único endereço do cliente
                echo "Não é permitido excluir o único endereço do cliente.";
                exit;
            }
        }

        // Agora podemos excluir o endereço, seja ele principal ou não
        $endereco->delete();
        
        // Redireciona ou exibe a lista de endereços novamente
        header('Location: /enderecos');
        exit;
    }
}

