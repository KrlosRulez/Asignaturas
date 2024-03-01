package com.example.proyecto_u1

import android.app.Dialog
import android.os.Bundle
import android.view.ContextMenu
import android.view.Menu
import android.view.MenuInflater
import android.view.MenuItem
import android.view.View
import android.widget.AdapterView
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView

class MainActivity : AppCompatActivity(), ArticuloAdapter.OnArticuloContextMenuListener {   // Tiene la interfaz del adapter

    private lateinit var recycler_view: RecyclerView    // RecyclerView global a toda la clase

    private lateinit var nombre_nuevo_articulo: String

    // Crear una lista modificable de artículos
    private var articulos = mutableListOf(
        Articulo("Chicles"),
        Articulo("Doritos"),
        Articulo("Queso"),
        Articulo("Pan"),
        Articulo("Aceite")
    )

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        recycler_view = findViewById(R.id.recycler_view)  // Referenciar al RecyclerView
        recycler_view.layoutManager = LinearLayoutManager(this) // Organizar los elementos en vertical

        recycler_view.adapter = ArticuloAdapter(articulos, this) // Estabecer adaptador

        // registerForContextMenu(recycler_view)

    }

    // Crear un menú ##################################################################################################################
    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        val inflater: MenuInflater = menuInflater
        inflater.inflate(R.menu.my_menu, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        return when (item.itemId) {
            R.id.nuevo_articulo -> { // Tengo que crear un dialogo y luego llamar a la función con el nombre introducido como parámetro
                crearDialogoArticulo()
                true
            }
            else -> super.onOptionsItemSelected(item)
        }
    }

    private fun crearDialogoArticulo() {

        lateinit var nom_articulo: String

        // Mostrar diálogo para pedir nombre
        val dialog = Dialog(this)
        dialog.setContentView(R.layout.dialogo_articulo)

        val boton_agregar = dialog.findViewById<Button>(R.id.boton_editar)
        val nombre_articulo = dialog.findViewById<EditText>(R.id.nombre_articulo)

        boton_agregar.setOnClickListener {

            nom_articulo = nombre_articulo.text.toString()  // Guardar nombre escrito en el diálogo

            if (nom_articulo == "") {

                // Si el nombre del artículo está vacío, mostrar mensaje de aviso
                val toast = Toast.makeText(this, "No puedes añadir artículos vacíos", Toast.LENGTH_SHORT)
                toast.show()

            } else {

                dialog.dismiss() // Cerrar el diálogo después de obtener la información
                nombre_nuevo_articulo = nom_articulo    // Parámetro para "crearNuevoArticulo"
                crearNuevoArticulo(nombre_nuevo_articulo)   // Crear nuevo artículo

            }

        }

        dialog.show()

    }

    private fun crearNuevoArticulo(nombre: String) {

        val nuevo_articulo = Articulo(nombre)   // Crear artículo con String escrita en el diálogo
        articulos.add(nuevo_articulo)   // Añadir el nuevo artículo a la mutableListOf de Artículos
        recycler_view.adapter = ArticuloAdapter(articulos, this) // Recargar adaptador

    }

    // #################################################################################################################################

    // Context Menu

    // Método para editar el artículo (tiene como parámetro la posición del artículo pulsado)
    override fun editarArticulo(position: Int) {

        editarDialogoArticulo(position)

    }

    private fun editarDialogoArticulo(position: Int) {

        lateinit var nom_articulo: String

        // Mostrar diálogo para pedir nombre
        val dialog = Dialog(this)
        dialog.setContentView(R.layout.editar_articulo)

        val boton_editar = dialog.findViewById<Button>(R.id.boton_editar)
        val nombre_articulo = dialog.findViewById<EditText>(R.id.nombre_articulo)

        boton_editar.setOnClickListener {

            nom_articulo = nombre_articulo.text.toString()  // Guardar nombre escrito en el diálogo

            if (nom_articulo == "") {

                // Si el nombre del artículo está vacío, mostrar mensaje de aviso
                val toast = Toast.makeText(this, "No puedes añadir artículos vacíos", Toast.LENGTH_SHORT)
                toast.show()

            } else {

                dialog.dismiss() // Cerrar el diálogo después de obtener la información
                articulos[position].nombre = nom_articulo
                recycler_view.adapter?.notifyItemChanged(position)

                

                //recycler_view.adapter = ArticuloAdapter(articulos, this) // Recargar adaptador

            }

        }

        dialog.show()

    }

    // Método para borrar el artículo (tiene como parámetro la posición del artículo pulsado)
    override fun borrarArticulo(position: Int) {

        articulos.removeAt(position) // Borrar artículo
        recycler_view.adapter = ArticuloAdapter(articulos, this) // Recargar adaptador

    }

}