import 'package:ecotech/card.dart';
import 'package:ecotech/home.dart';
import 'package:ecotech/localizar.dart';
import 'package:flutter/material.dart';
import 'package:ecotech/perfil.dart';
import 'package:ecotech/publicacoes.dart';

void main() {
  runApp(Home_segundo());
}

class Home_segundo extends StatelessWidget {
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
  bool _showCommentBox1 = false;
  bool _showCommentBox2 = false;
  bool _showCommentBox3 = false;
  bool _isLiked1 = false;
  bool _isLiked2 = false;
  bool _isLiked3 = false;
  TextEditingController _commentController1 = TextEditingController();
  TextEditingController _commentController2 = TextEditingController();
  TextEditingController _commentController3 = TextEditingController();

  void _onItemTapped(int index) {
    setState(() {
      _selectedIndex = index;
    });
    switch (index) {
      case 0:
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => Perfil()),
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

  void _toggleCommentBox1() {
    setState(() {
      _showCommentBox1 = !_showCommentBox1;
    });
  }

  void _toggleCommentBox2() {
    setState(() {
      _showCommentBox2 = !_showCommentBox2;
    });
  }

  void _toggleCommentBox3() {
    setState(() {
      _showCommentBox3 = !_showCommentBox3;
    });
  }

  void _toggleLike1() {
    setState(() {
      _isLiked1 = !_isLiked1;
    });
  }

  void _toggleLike2() {
    setState(() {
      _isLiked2 = !_isLiked2;
    });
  }

  void _toggleLike3() {
    setState(() {
      _isLiked3 = !_isLiked3;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text(
          "EcoTech",
          style: TextStyle(color: Colors.white, fontSize: 18),
        ),
        backgroundColor: Color.fromARGB(255, 21, 83, 24),
        iconTheme: const IconThemeData(color: Colors.white),
      ),
      drawer: Drawer(
        backgroundColor: Color.fromARGB(255, 21, 83, 24),
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
                  MaterialPageRoute(builder: (context) => Perfil()),
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
                  MaterialPageRoute(builder: (context) => Home()),
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
            Padding(
                padding: const EdgeInsets.all(20.0),
                child: 
                  // Publicação 1
                  _buildPost(
                    'User',
                    '@USER.456723',
                    'assets/imagem1.jpg',
                    'Alguém poderia me informar se algum caminhão ainda faz coleta de lixo eletrônico nesse terreno? Pois a coisa ta feia kkk...',
                    _isLiked1,
                    _toggleLike1,
                    _showCommentBox1,
                    _toggleCommentBox1,
                    _commentController1,
                  ),
            ),

            const SizedBox(height: 20),
            Padding(
                padding: const EdgeInsets.all(20.0),
                child:
                  // Publicação 2
                  _buildPost(
                    'Lurdes',
                    '@LURDES.203',
                    'assets/imagem2.jpg',
                    'Alguém sabe onde posso descartar essas pilhas que venho guardando a um tempinho?!',
                    _isLiked2,
                    _toggleLike2,
                    _showCommentBox2,
                    _toggleCommentBox2,
                    _commentController2,
                  ),
            ),

            const SizedBox(height: 20),

            Padding(
                padding: const EdgeInsets.all(20.0),
                child:
                  // Publicação 3
                  _buildPost(
                    'Robertão',
                    '@robertao_123',
                    'assets/imagem3.jpg',
                    'Faz um tempo que eu e minha familia reciclamos lixos eletrônicos e confesso que foi a melhor escolha que fizemos!',
                    _isLiked3,
                    _toggleLike3,
                    _showCommentBox3,
                    _toggleCommentBox3,
                    _commentController3,
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
            label: 'Perfil',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.home),
            label: 'Início',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.article),
            label: 'Publicações',
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

  Widget _buildPost(
    String userName,
    String userTag,
    String imagePath,
    String postContent,
    bool isLiked,
    VoidCallback toggleLike,
    bool showCommentBox,
    VoidCallback toggleCommentBox,
    TextEditingController commentController,
  ) {
    return Card(
      elevation: 5,
      child: Padding(
        padding: const EdgeInsets.all(20.0),
        child: Column(
          children: [
            Row(
              children: [
                CircleAvatar(
                  backgroundImage: AssetImage(imagePath),
                  radius: 30,
                ),
                const SizedBox(width: 10),
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      userName,
                      style: const TextStyle(
                        fontWeight: FontWeight.bold,
                        fontSize: 16,
                      ),
                    ),
                    Text(userTag),
                  ],
                )
              ],
            ),
            const SizedBox(height: 20),
            Image.asset(
              imagePath,
              height: 270,
              width: double.infinity,
              fit: BoxFit.cover,
            ),
            const SizedBox(height: 20),
            Text(
              postContent,
              style: TextStyle(fontSize: 16),
            ),
            const SizedBox(height: 10),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceAround,
              children: [
                TextButton.icon(
                  onPressed: toggleLike,
                  icon: Icon(
                    Icons.thumb_up,
                    color: isLiked ? Color.fromARGB(255, 253, 0, 0) : Color.fromARGB(255, 38, 56, 46),
                  ),
                  label: Text(
                    'Curtir',
                    style: TextStyle(
                      color: isLiked ? Color.fromARGB(255, 255, 1, 1) : Color.fromARGB(255, 38, 56, 46),
                    ),
                  ),
                ),
                TextButton.icon(
                  onPressed: toggleCommentBox,
                  icon: const Icon(Icons.comment, color: Color.fromARGB(255, 38, 56, 46)),
                  label: const Text('Comentar', style: TextStyle(color: Color.fromARGB(255, 38, 56, 46))),
                ),
              ],
            ),
            if (showCommentBox)
              Column(
                children: [
                  TextField(
                    controller: commentController,
                    decoration: InputDecoration(
                      hintText: 'Escreva um comentário...',
                      border: OutlineInputBorder(),
                    ),
                  ),
                  const SizedBox(height: 8),
                  ElevatedButton(
                    onPressed: () {
                      print("Comentário publicado: ${commentController.text}");
                      commentController.clear();
                      setState(() {
                        showCommentBox = false;
                      });
                    },
                    child: const Text('Publicar'),
                  ),
                ],
              ),
          ],
        ),
      ),
    );
  }
}
