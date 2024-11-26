import 'package:ecotech/home.dart'; 
import 'package:ecotech/home_terceiro.dart';
import 'package:ecotech/localizar_empresa.dart';
import 'package:ecotech/publica%C3%A7%C3%B5es_empresa.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(const Perfil_empresa());
}

class Perfil_empresa extends StatelessWidget {
  const Perfil_empresa({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'EcoTech',
      debugShowCheckedModeBanner: false,
      home: ProfilePage(),
    );
  }
}

class ProfilePage extends StatefulWidget {
  @override
  _ProfilePageState createState() => _ProfilePageState();
}

// ignore: must_be_immutable
class _ProfilePageState extends State<ProfilePage> {
  int _selectedIndex = 0;

  void _onItemTapped(int index) {
    setState(() {
      _selectedIndex = index;
    });
    switch (index) {
      case 0:
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => const Perfil_empresa()),
        );
        break;
      case 1:
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => Home_terceiro()),
        );
        break;
      case 2:
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => const Publicacoes_empresa()),
        );
        break;
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "EcoTech",
          style: TextStyle(color: Color.fromARGB(255, 255, 255, 255), fontSize: 18),
        ),
        backgroundColor: const Color.fromARGB(255, 21, 83, 24),
        iconTheme: const IconThemeData(color: Color.fromARGB(255, 255, 255, 255)),
        actions: [
          IconButton(
            icon: const Icon(Icons.edit),
            tooltip: 'Editar Perfil',
            onPressed: () {
              Navigator.push(
                context,
                MaterialPageRoute(
                  builder: (context) => EditarPerfilPage(),
                ),
              );
            },
          ),
        ],
      ),
      drawer: Drawer(
        backgroundColor: const Color.fromARGB(255, 21, 83, 24),
        child: ListView(
          padding: EdgeInsets.zero,
          children: <Widget>[
            const SizedBox(
              height: 80,
              child: DrawerHeader(
                decoration: BoxDecoration(
                  color: Color.fromARGB(255, 21, 83, 24),
                ),
                child: Text(
                  'Menu',
                  style: TextStyle(color: Colors.white, fontSize: 18),
                ),
              ),
            ),
            ListTile(
              title: const Text("Início", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => Home_terceiro()),
                );
              },
            ),
            ListTile(
              title: const Text("Perfil", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const Perfil_empresa()),
                );
              },
            ),
            ListTile(
              title: const Text("Publicações", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const Publicacoes_empresa()),
                );
              },
            ),
            ListTile(
              title: const Text("Localizações", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const Locais_empresa()),
                );
              },
            ),
            ListTile(
              title: const Text("Sair", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const Home()),
                );
              },
            ),
          ],
        ),
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            const Padding(
              padding: EdgeInsets.fromLTRB(0, 10, 80, 0),
              child: Row(
                children: [
                  SizedBox(width: 70),
                  CircleAvatar(
                    radius: 40,
                    backgroundImage: AssetImage('assets/logo.jpg'),
                  ),
                  SizedBox(width: 15),
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        '\nEcoTech',
                        style: TextStyle(
                          color: Color.fromARGB(255, 0, 2, 0),
                        ),
                      ),
                      Text(
                        'Tambaú, SP\nTransformando lixo em novas\n oportunidades!',
                        style: TextStyle(
                          color: Colors.grey,
                        ),
                      ),
                    ],
                  ),
                ],
              ),
            ),
            const SizedBox(height: 60),
            const Padding(
              padding: EdgeInsets.fromLTRB(80, 0, 80, 0),
              child: Text(
                'A EcoTech é líder em soluções de reciclagem de resíduos eletrônicos. Nossa missão é contribuir para um mundo mais limpo, oferecendo serviços de coleta e reciclagem que transformam o lixo eletrônico em novos recursos.',
                textAlign: TextAlign.justify,
                style: TextStyle(fontSize: 14, color: Color.fromARGB(255, 0, 0, 0)),
              ),
            ),
            const SizedBox(height: 25),
            ListView.builder(
              shrinkWrap: true,
              physics: const NeverScrollableScrollPhysics(),
              itemCount: 1,
              itemBuilder: (context, index) {
                return Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Column(
                    children: [
                      Container(
                        color: Colors.grey[300],
                        width: 300,
                        child: Image.asset(
                          'assets/post$index.jpeg',
                          fit: BoxFit.cover,
                        ),
                      ),
                      const SizedBox(height: 10),
                      const Padding(
                        padding: EdgeInsets.fromLTRB(80, 0, 80, 0),
                        child: Text(
                          'Inovação sustentável! Recebemos um prêmio por práticas ambientais responsáveis! Estamos ajudando a reduzir o impacto ambiental. 🌍♻️ #EcoTechReciclagem',
                          style: TextStyle(color: Color.fromARGB(255, 0, 0, 0)),
                          textAlign: TextAlign.justify,
                        ),
                      ),
                    ],
                  ),
                );
              },
            ),
          ],
        ),
      ),
      bottomNavigationBar: BottomNavigationBar(
        items: const <BottomNavigationBarItem>[
          BottomNavigationBarItem(icon: Icon(Icons.person), label: 'Perfil'),
          BottomNavigationBarItem(icon: Icon(Icons.home), label: 'Início'),
          BottomNavigationBarItem(icon: Icon(Icons.article), label: 'Publicações'),
        ],
        backgroundColor: const Color.fromARGB(255, 21, 83, 24),
        unselectedItemColor: const Color.fromARGB(255, 255, 255, 255),
        selectedItemColor: const Color.fromARGB(255, 255, 255, 255),
        currentIndex: _selectedIndex,
        onTap: _onItemTapped,
      ),
    );
  }
}

// ignore: must_be_immutable
class EditarPerfilPage extends StatelessWidget {
  final TextEditingController _nameController = TextEditingController();
  final TextEditingController _bioController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Editar Perfil'),
        backgroundColor: Color.fromARGB(255, 21, 83, 24),
        actions: [
          TextButton(
            onPressed: () {
              // Ação simples para o botão "Salvar Alterações"
              ScaffoldMessenger.of(context).showSnackBar(
                const SnackBar(content: Text('Alterações salvas com sucesso!')),
              );
              Navigator.pop(context); // Retorna à página anterior
            },
            child: const Text(
              'Salvar',
              style: TextStyle(color: Colors.white),
            ),
          ),
        ],
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            // Editor de Imagem de Perfil
            Stack(
              children: [
                const CircleAvatar(
                  radius: 60,
                  backgroundImage: AssetImage('assets/logo.jpg'), // Imagem do perfil
                ),
                Positioned(
                  bottom: 0,
                  right: 4,
                  child: IconButton(
                    icon: const Icon(Icons.camera_alt, color: Color.fromARGB(255, 21, 83, 24)),
                    onPressed: () {
                      ScaffoldMessenger.of(context).showSnackBar(
                        const SnackBar(content: Text('Abrir Galeria')),
                      );
                    },
                  ),
                ),
              ],
            ),
            const SizedBox(height: 20),
            
            // Editor de Nome
            TextField(
              controller: _nameController,
              decoration: const InputDecoration(
                labelText: 'Nome',
                border: OutlineInputBorder(),
              ),
            ),
            const SizedBox(height: 20),

            // Editor de Bio
            TextField(
              controller: _bioController,
              maxLines: 3,
              decoration: const InputDecoration(
                labelText: 'Bio',
                border: OutlineInputBorder(),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
