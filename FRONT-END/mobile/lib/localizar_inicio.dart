import 'package:ecotech/Locais_inicio.dart';
import 'package:ecotech/home.dart';
import 'package:flutter/material.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:url_launcher/url_launcher.dart';

void main() => runApp(const LocaisInicio());

class LocaisInicio extends StatelessWidget {
   const LocaisInicio({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: LocaisPageTwo(),
      debugShowCheckedModeBanner: false,
    );
  }
}

class LocaisPageTwo extends StatefulWidget {
  @override
  _LocaisPageState createState() => _LocaisPageState();
}

class _LocaisPageState extends State<LocaisPageTwo> {
  final List<LocalColeta> _locaisColeta = [
    LocalColeta(
      nome: 'SESI Joelmir Beting',
      endereco: 'Rua Boa Vista, 100 - Tambaú, SP',
      latLng: const LatLng(-21.7025, -47.2702),
    ),
    LocalColeta(
      nome: 'Prefeitura Municipal de Tambaú',
      endereco: 'Rua Dr. Alfredo Guedes, 5 - Centro - Tambaú, SP',
      latLng: const LatLng(-21.7058, -47.2731),
    ),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Color.fromARGB(255, 21, 83, 24),
        elevation: 0,
        title: const Text(
          'Locais de Coleta',
          style: TextStyle(
            color: Color.fromARGB(221, 253, 253, 253),
            fontWeight: FontWeight.bold,
          ),
        ),
        centerTitle: true,
        iconTheme: const IconThemeData(color: Colors.white),
        leading: IconButton(
          icon: const Icon(Icons.arrow_back),
        onPressed: () {
           Navigator.push(
           context,
            MaterialPageRoute(builder: (context) => Home()),
          );
        },
        ),
      ),
      body: Column(
        children: [
          // Exibindo a imagem completa
          Container(
            width: double.infinity,
            child: Image.asset(
              'assets/locais.jpg', // Certifique-se de que a imagem está no diretório correto
              fit: BoxFit.cover,
              height: 250,
            ),
          ),
          const SizedBox(height: 10),
          Expanded(
            child: ListView.builder(
              padding: const EdgeInsets.all(16),
              itemCount: _locaisColeta.length,
              itemBuilder: (context, index) {
                final local = _locaisColeta[index];
                return _buildCard(local);
              },
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildCard(LocalColeta local) {
    return Card(
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(15)),
      elevation: 4,
      margin: const EdgeInsets.symmetric(vertical: 10),
      child: ListTile(
        contentPadding: const EdgeInsets.symmetric(horizontal: 20, vertical: 15),
        title: Text(
          local.nome,
          style: const TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
        ),
        subtitle: Text(
          local.endereco,
          style: TextStyle(fontSize: 16, color: Colors.grey[700]),
        ),
        trailing: Icon(Icons.map, color: Colors.green[700]),
        onTap: () => _abrirMapa(local.latLng),
      ),
    );
  }

  // Função para abrir o Google Maps com a localização do local
  void _abrirMapa(LatLng latLng) async {
    final String googleMapsUrl =
        'https://www.google.com/maps/search/?api=1&query=${latLng.latitude},${latLng.longitude}';
    if (await canLaunch(googleMapsUrl)) {
      await launch(googleMapsUrl);
    } else {
      throw 'Não foi possível abrir o mapa.';
    }
  }
}

// Modelo de Local de Coleta
class LocalColeta {
  final String nome;
  final String endereco;
  final LatLng latLng;

  LocalColeta({
    required this.nome,
    required this.endereco,
    required this.latLng,
  });
}
