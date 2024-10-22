import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;

void main() {
  runApp(EnergiaApp());
}

class EnergiaApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Consumo de Energia',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: ConsumoPage(),
    );
  }
}

class ConsumoPage extends StatefulWidget {
  @override
  _ConsumoPageState createState() => _ConsumoPageState();
}

class _ConsumoPageState extends State<ConsumoPage> {
  List<dynamic> consumos = [];
  final String urlGet = 'http://localhost/energia_consumo/backend/api/get_consumo.php';

  @override
  void initState() {
    super.initState();
    fetchConsumo();
  }

  Future<void> fetchConsumo() async {
    final response = await http.get(Uri.parse(urlGet));
    if (response.statusCode == 200) {
      setState(() {
        consumos = json.decode(response.body);
      });
    } else {
      throw Exception('Falha ao carregar dados');
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Consumo de Energia'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          children: [
            Expanded(
              child: ListView.builder(
                itemCount: consumos.length,
                itemBuilder: (context, index) {
                  return ListTile(
                    title: Text(consumos[index]['dispositivo']),
                    subtitle: Text('Consumo: ${consumos[index]['consumo']} kWh'),
                  );
                },
              ),
            ),
            ElevatedButton(
              onPressed: fetchConsumo, // Atualiza os dados manualmente
              child: Text('Atualizar Dados'),
            ),
          ],
        ),
      ),
    );
  }
}
