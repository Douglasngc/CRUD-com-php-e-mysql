<?php

switch ($_REQUEST["acao"]) {
    case 'cadastrar';
        $name = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc)
    VALUES ('{$name}', '{$email}','{$senha}','{$data_nasc}')";

        $res = $conn->query($sql);

        if ($res == true) {
             "<script>alert('Cadastro com sucesso');</scipt>";
            print "<script> location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possivel cadastrar');</scipt>";
            print "<script>location.href='?page=listar';<script>";
        }



    break;
    case 'editar';
        $name = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "UPDATE usuarios SET
                nome='{$name}',
                email='{$email}',
                senha='{$senha}',
                data_nasc='{$data_nasc}'
                WHERE
                    id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editado com sucesso');</scipt>";
            print "<script> location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possivel editar');</scipt>";
            print "<script>location.href='?page=editar-usu';<script>";
        }
    break;
    case 'excluir';

        $sql = "DELETE FROM usuarios WHERE id=" . $_REQUEST["id"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluído com sucesso');</scipt>";
            print "<script> location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possivel excluir');</scipt>";
            print "<script>location.href='?page=listar';<script>";
        }

    break;
}
