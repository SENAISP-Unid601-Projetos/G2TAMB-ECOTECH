import 'package:ecotech/cadastro.dart';
import 'package:ecotech/home.dart';
// ignore: unused_import
import 'package:ecotech/publicacoes.dart';
// ignore: unused_import
import 'package:ecotech/perfil.dart';
// ignore: unused_import
import 'package:ecotech/home_segundo.dart';
// ignore: unused_import
import 'package:ecotech/criar_post.dart';
import 'package:flutter/material.dart';

class RouteGenerator {
  static Route<dynamic> generateRoute(RouteSettings settings) {
    switch (settings.name) {
      case "/":
        return MaterialPageRoute(builder: (_) => Home());
      case "/cadastrar":
        return MaterialPageRoute(builder: (_) => const Cadastro());
      default:
        _erroRota();
    }
    throw '';
  }

  static Route<dynamic> _erroRota() {
    return MaterialPageRoute(builder: (_) {
      return Scaffold(
        appBar: AppBar(
          title: const Text("Erro Rota"),
        ),
        body: const Text("Tela não encontrada"),
      );
    });
  }
}