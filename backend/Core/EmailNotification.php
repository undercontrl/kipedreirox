<?php
namespace App\Kipedreiro\Core;
use App\Kipedreiro\Core\EmailService;

class EmailNotification{
    private EmailService $emailService;
    public function __construct(){
        $this->emailService = new EmailService();
    }

    public function esqueciASenha(string $email, string $token): void{
        $assunto = "Redefinição de Senha";
        $mensagem = "Recebemos uma solicitação se redefinição de senha, clique no link abaixo para redefinir sua senha: ";
        $mensagem .= "http://localhost:9000/backend/redefinir-senha?token=" . urlencode($token);
        $this->emailService->send($email, $assunto, $mensagem);
    }
    public function boasVindas(string $email, string $nome): void{
        $assunto = "Bem-vindo ao Kipedreiro!";
        $mensagem = "<b><h2>Olá " . htmlspecialchars($nome) . ",</h2></b>\n\n";
        $mensagem .= "<p>Obrigado por se registrar no Kipedreiro!</p>\n\n";
        $mensagem .= "<p>Atenciosamente,\nEquipe Kipereiro</p>";
        $this->emailService->send($email, $assunto, $mensagem);
    }
}