import 'package:ecotech/home_segundo.dart';
import 'package:ecotech/localizar.dart';
import 'package:ecotech/perfil.dart';
import 'package:ecotech/criar_post.dart'; // Importando a página de nova postagem
import 'package:flutter/material.dart';

void main() {
  runApp(const Publicacoes());
}

class Publicacoes extends StatelessWidget {
  const Publicacoes({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: PostPage(),
    );
  }
}

class PostPage extends StatefulWidget {
  @override
  _PostPageState createState() => _PostPageState();
}

class _PostPageState extends State<PostPage> {

  int _selectedIndex = 0;

  // ignore: unused_element
  void _onItemTapped(int index) {

    setState(() {
      _selectedIndex = index;
    });
    // Aqui você pode adicionar lógica para navegação para diferentes páginas
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
           MaterialPageRoute(builder: (context) => LocaisPage()),  // Adicione a página correspondente
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
              title: const Text("Inicio", style: TextStyle(color: Colors.white)),
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
          ],
        ),
      ),
      body: SingleChildScrollView(
        child: Padding(
          padding: const EdgeInsets.all(16.0),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              SizedBox(
                width: double.infinity,  // Faz o botão ocupar toda a largura da tela
                child: ElevatedButton(
                  onPressed: () {
                    // Navegação para a página de nova postagem
                    Navigator.push(
                      context,
                      MaterialPageRoute(builder: (context) => CriarPostPage()),
                    );
                  },
                  style: ElevatedButton.styleFrom(
                    backgroundColor: const Color.fromARGB(255, 21, 83, 24),
                    padding: const EdgeInsets.symmetric(vertical: 16), // Define o tamanho vertical do botão
                  ),
                  child: const Text(
                    '+ Nova Postagem',
                    style: TextStyle(color: Colors.white),
                  ),
                ),
              ),
              const SizedBox(height: 20),
              Card(
                elevation: 5,
                child: Padding(
                  padding: const EdgeInsets.all(12.0),
                  child: Column(
                    children: [
                      const Row(
                        children: [
                          CircleAvatar(
                            backgroundImage: AssetImage('assets/robertao.jpeg'),
                            radius: 30,
                          ),
                          SizedBox(width: 10),
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                'Robertão',
                                style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontSize: 16,
                                ),
                              ),
                              Text('@robertao_123'),
                            ],
                          )
                        ],
                      ),
                      const SizedBox(height: 20),
                      Image.asset(
                        'assets/post5.jpeg',
                        height: 270,
                        width: double.infinity,
                        fit: BoxFit.cover,
                      ),
                      const SizedBox(height: 20),
                      const Text(
                        'Muito legal essa ideia do projeto de vocês! Logo que vi o site já mostrei para minha querida esposa e desde então ajudamos em toda coleta. Muito bom fazer parte disso! '
                        '#DescarteConsciente #RecicleTambém #VenhaFazerParteDisso',
                        style: TextStyle(fontSize: 16),
                      ),
                      const SizedBox(height: 10),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceAround,
                        children: [
                          TextButton.icon(
                            onPressed: () {},
                            icon: const Icon(Icons.thumb_up, color: Color.fromARGB(255, 38, 56, 46)),
                            label: const Text('Curtir', style: TextStyle(color: Color.fromARGB(255, 38, 56, 46))),
                          ),
                          TextButton.icon(
                            onPressed: () {},
                            icon: const Icon(Icons.comment, color: Color.fromARGB(255, 38, 56, 46)),
                            label: const Text('Comentar', style: TextStyle(color: Color.fromARGB(255, 38, 56, 46))),
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
      bottomNavigationBar: BottomNavigationBar(
        items: const <BottomNavigationBarItem>[
          BottomNavigationBarItem(icon: Icon(Icons.person), label: 'Perfil'),
          BottomNavigationBarItem(icon: Icon(Icons.home), label: 'Início'),
          BottomNavigationBarItem(icon: Icon(Icons.pin_drop), label: 'Localização'),
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
