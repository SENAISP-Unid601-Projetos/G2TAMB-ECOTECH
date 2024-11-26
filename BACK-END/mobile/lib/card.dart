import 'package:flutter/material.dart';

class CompanyCard extends StatefulWidget {
  const CompanyCard({super.key});

  @override
  _CompanyCardState createState() => _CompanyCardState();
}

class _CompanyCardState extends State<CompanyCard> {
  bool _isExpanded = false;

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () {
        setState(() {
          _isExpanded = !_isExpanded;
        });
      },
      child: Card(
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(15.0),
        ),
        elevation: 4,
        child: Padding(
          padding: const EdgeInsets.all(16.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              // Logo da empresa
              Image.asset(
                'assets/ecotech-removebg-preview.png', // Substitua pelo caminho do seu logo
                height: 100,
              ),
              const SizedBox(height: 10),

              // Título (Nome da Empresa)
              const Text(
                'Descarte Inteligente, Futuro Limpo',
                style: TextStyle(
                  fontSize: 20,
                  fontWeight: FontWeight.bold,
                ),
              ),
              const SizedBox(height: 10),

              // Descrição (Expandida ou não)
              AnimatedCrossFade(
                duration: const Duration(milliseconds: 300),
                firstChild: const SizedBox.shrink(), // Se estiver fechado, não mostra nada
                secondChild: const Text(
                  'Nosso objetivo é transformar a forma como o lixo eletrônico é coletado e reciclado, promovendo a sustentabilidade e a acessibilidade para todos. EcoTech está comprometida em reduzir o impacto ambiental através da reciclagem consciente e responsável.',
                  textAlign: TextAlign.center,
                  style: TextStyle(fontSize: 16, color: Color.fromARGB(255, 95, 94, 94)),
                ),
                crossFadeState: _isExpanded
                    ? CrossFadeState.showSecond
                    : CrossFadeState.showFirst,
              ),
              const SizedBox(height: 10),

              // Indicador de "expandir/recolher"
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Icon(
                    _isExpanded
                        ? Icons.keyboard_arrow_up
                        : Icons.keyboard_arrow_down,
                    color: Colors.green[700],
                  ),
                  Text(
                    _isExpanded ? 'Recolher' : 'Saiba mais',
                    style: TextStyle(
                      fontSize: 16,
                      color: Colors.green[700],
                    ),
                  ),
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }
}