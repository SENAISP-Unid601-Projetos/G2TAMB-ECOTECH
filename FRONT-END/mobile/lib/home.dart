import 'package:ecotech/card.dart';
import 'package:ecotech/localizar_inicio.dart';
import 'package:ecotech/login.dart';
import 'package:flutter/material.dart';
import 'package:ecotech/cadastro.dart';

void main() {
  runApp(const Home());
}

class Home extends StatelessWidget {
  const Home({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'EcoTech',
      home: HomePage(),
      debugShowCheckedModeBanner: false,
    );
  }
}

class HomePage extends StatefulWidget {
  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  int _selectedIndex = 0;

  void _onItemTapped(int index) {
    setState(() {
      _selectedIndex = index;
    });
    // Aqui você pode adicionar lógica para navegação para diferentes páginas
    switch (index) {
      case 0:
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => login()),
        );
        break;
      case 1:
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => const Cadastro()),
        );
        break;
       case 2:
         Navigator.push(
           context,
           MaterialPageRoute(builder: (context) => const LocaisInicio()),  // Adicione a página correspondente
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
          style: TextStyle(color: Colors.white, fontSize: 18),
        ),
        backgroundColor: const Color.fromARGB(255, 21, 83, 24),
        iconTheme: const IconThemeData(color: Colors.white),
      ),
      drawer: Drawer(
        backgroundColor: const Color.fromARGB(255, 21, 83, 24),
        child: ListView(
          padding: EdgeInsets.zero,
          children: <Widget>[
            Container(
              height: 80,
              child: const DrawerHeader(
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
              title: const Text("Entrar", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => login()),
                );
              },
            ),
            ListTile(
              title: const Text("Cadastrar", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const Cadastro()),
                );
              },
            ),
            ListTile(
              title: const Text("Localizações", style: TextStyle(color: Colors.white)),
              onTap: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => const LocaisInicio()),
                );
              },
            ),
          ],
        ),
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            Container(
              
              child: const Padding(
                padding: EdgeInsets.all(20.0),
                child: Column(
                  children: [
                    CompanyCard(),
                    SizedBox(height: 50),
                  ],
                ),
              ),
            ),
            const SizedBox(height: 10),
            Card(
                elevation: 5,
                child: Padding(
                  padding: const EdgeInsets.all(12.0),
                  child: Column(
                    children: [
                      const Row(
                        children: [
                          CircleAvatar(
                            backgroundImage: AssetImage('assets/imagem1.jpg'),
                            radius: 30,
                          ),
                          SizedBox(width: 10),
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                'User',
                                style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontSize: 16,
                                ),
                              ),
                              Text('@USER.456723'),
                            ],
                          )
                        ],
                      ),
                      const SizedBox(height: 20),
                      Image.asset(
                        'assets/imagem1.jpg',
                        height: 270,
                        width: double.infinity,
                        fit: BoxFit.cover,
                      ),
                      const SizedBox(height: 20),
                      const Text(
                        'Alguém poderia me informar se algum caminhão ainda faz coleta de lixo eletrõnico nesse terreno? Pois a coisa ta feia kkk...',
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
                            backgroundImage: AssetImage('assets/imagem2.jpg'),
                            radius: 30,
                          ),
                          SizedBox(width: 10),
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                'Lurdes',
                                style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontSize: 16,
                                ),
                              ),
                              Text('@LURDES.203'),
                            ],
                          )
                        ],
                      ),
                      const SizedBox(height: 20),
                      Image.asset(
                        'assets/imagem2.jpg',
                        height: 270,
                        width: double.infinity,
                        fit: BoxFit.cover,
                      ),
                      const SizedBox(height: 20),
                      const Text(
                        'Alguém sabe onde posso descartar essas pilhas que venho guardando a um tempinho?!',
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
                        'assets/imagem3.jpg',
                        height: 270,
                        width: double.infinity,
                        fit: BoxFit.cover,
                      ),
                      const SizedBox(height: 20),
                      const Text(
                        'Faz um tempo que eu e minha familia reciclamos lixos eletrônicos e confesso que foi a melhor escolhas que fizemos!',
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
            const SizedBox(height: 50),
          ],
        ),
      ),
      bottomNavigationBar: BottomNavigationBar(
        items: const <BottomNavigationBarItem>[
          BottomNavigationBarItem(
            icon: Icon(Icons.person),
            label: 'Entrar',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.person_add),
            label: 'Cadastrar',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.pin_drop),
            label: 'Localização',
          ),
        ],
        backgroundColor: const Color.fromARGB(255, 21, 83, 24),
        unselectedItemColor: Colors.white,
        selectedItemColor: Colors.white,
        currentIndex: _selectedIndex,
        onTap: _onItemTapped,
      ),
    );
  }

  Widget _buildInfoCard(String userName, String imagePath, String text) {
    return Container(
      color: userName == 'USER.456723'
          ? const Color.fromARGB(13, 56, 56, 56)
          : userName == 'LURDES.203'
              ? const Color.fromARGB(13, 56, 56, 56)
              : const Color.fromARGB(13, 66, 66, 66),
      width: 400,
      child: Padding(
        padding: const EdgeInsets.all(50.0),
        child: Column(
          children: [
            Row(
              children: [
                const Icon(Icons.person, color: Color.fromARGB(255, 33, 101, 18)),
                const SizedBox(width: 5),
                Text(
                  userName,
                  textAlign: TextAlign.start,
                  style: const TextStyle(color: Color.fromARGB(255, 33, 101, 18), fontSize: 20),
                ),
              ],
            ),
            const SizedBox(height: 20),
            Image.asset(imagePath, height: 200),
            const SizedBox(height: 50),
            Text(
              text,
              style: const TextStyle(fontSize: 16),
              textAlign: TextAlign.left,
            ),
            const SizedBox(height: 50),
            ElevatedButton(
              onPressed: () {
                print("Botão Responder clicado");
              },
              style: ElevatedButton.styleFrom(
                backgroundColor: const Color.fromARGB(255, 26, 96, 28),
                foregroundColor: Colors.white,
                padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 12),
                textStyle: const TextStyle(fontSize: 18),
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(6),
                ),
              ),
              child: const Text('Responder'),
            ),
          ],
        ),
      ),
    );
  }
}

publicacoes() {
}
