import 'package:ecotech/home.dart';
import 'package:ecotech/home_segundo.dart';
import 'package:ecotech/localizar.dart';
import 'package:ecotech/publicacoes.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(const Perfil());
}

class Perfil extends StatelessWidget {
  const Perfil({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      title: 'EcoTech',
      debugShowCheckedModeBanner: false,
      home: ProfilePage(),
    );
  }
}

class ProfilePage extends StatefulWidget {
  const ProfilePage({super.key});

  @override
  // ignore: library_private_types_in_public_api
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
          MaterialPageRoute(builder: (context) => const Perfil()),
        );
        break;
      case 1:
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => Home_segundo()),
        );
        break;
      case 2:
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => const Publicacoes()),
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
                MaterialPageRoute(builder: (context) => EditarPerfilPage()),
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
                  MaterialPageRoute(builder: (context) => Home_segundo()),
                );
              },
            ),
            ListTile(
              title: const Text("Perfil", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const Perfil()),
                );
              },
            ),
            ListTile(
              title: const Text("Publicações", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const Publicacoes()),
                );
              },
            ),
            ListTile(
              title: const Text("Localizações", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const Locais()),
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
              padding: EdgeInsets.all(16.0),
              child: Row(
                children: [
                  SizedBox(width: 70),
                  CircleAvatar(
                    radius: 40,
                    backgroundImage: AssetImage('assets/robertao.jpeg'),
                  ),
                  SizedBox(width: 15),
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        '\nrobertao_123',
                        style: TextStyle(
                          color: Color.fromARGB(255, 0, 2, 0),
                        ),
                      ),
                      Text(
                        'Robertão\nTambaú - SP\nAmante da natureza e da tecnologia!\nAmo minha família!',
                        style: TextStyle(
                          color: Colors.grey,
                        ),
                      ),
                    ],
                  ),
                ],
              ),
            ),
            const SizedBox(height: 16),
            ListView.builder(
              shrinkWrap: true,
              physics: const NeverScrollableScrollPhysics(),
              itemCount: 6,
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
                      const SizedBox(height: 5),
                      Padding(
                        padding: const EdgeInsets.fromLTRB(80, 0, 80, 0),
                        child: Text(
                          index == 0
                              ? 'Quando o lixo vira luxo! 🖥️♻️ Cada peça reciclada é um passo para salvar o planeta! 💪💚 #EcoTech'
                              : index == 1
                                  ? 'De pilha velha a super-herói ambiental! 🦸‍♂️🔋✨#BateriaSustentável'
                                  : index == 2
                                      ? 'Colecionando memórias com a minha esposa❤️'
                                      : index == 3
                                          ? '"Envelhecendo juntos e amando cada momento! 💕🌅 #JuntosParaSempre"'
                                          : index == 4
                                              ? '"Como o tempo passa rápido! Meu neto lindo🥰"'
                                              : '"Nossa paixão ainda brilha forte, assim como nossas baterias recicladas! 🌟🔋💞 #AmorDuradouro"',
                          style: const TextStyle(color: Color.fromARGB(255, 0, 0, 0)),
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
                  backgroundImage: AssetImage('assets/robertao.jpeg'), // Imagem do perfil
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
