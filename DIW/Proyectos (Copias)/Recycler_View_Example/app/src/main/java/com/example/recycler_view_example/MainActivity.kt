package com.example.recycler_view_example

import android.app.Activity
import android.content.Intent
import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.result.ActivityResultLauncher
import androidx.activity.result.contract.ActivityResultContracts
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.example.recycler_view_example.adapter.ItemAdapter
import com.example.recycler_view_example.data.Item
import com.example.recycler_view_example.ui.theme.Recycler_View_ExampleTheme

class MainActivity : ComponentActivity() {

    private lateinit var resultLauncher: ActivityResultLauncher<Intent>
    // Crear una lista mutable de "Item"
    private var items = mutableListOf(
        Item("Viva"),
        Item("el"),
        Item("Betis"),
        Item("Pedro"),
        Item("Sánchez")
    )

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        val recyclerView: RecyclerView = findViewById(R.id.recyclerView) // Referenciar al RecyclerView
        recyclerView.layoutManager = LinearLayoutManager(this) // Organizar los elementos en vertical

        resultLauncher = registerForActivityResult(ActivityResultContracts.StartActivityForResult()) { result ->
            if (result.resultCode == Activity.RESULT_OK) {
                val data: Intent? = result.data
                val newText = data?.getStringExtra("texto_nuevo")
                val originalText = data?.getStringExtra("texto_original")
                newText?.let { // Se actualiza el elemento de la lista con el nuevo texto
                    val position = items.indexOfFirst { it.text == originalText }
                    if (position != -1) {
                        items[position] = Item(newText)
                        recyclerView.adapter?.notifyItemChanged(position) // Notifica al RecyclerView que el elemento ha cambiado
                    }
                }
            }
        }

        // Se establece un adaptador para el RecyclerView
        // Para controlar los clicks en el RecyclerView
        // Y abrir SecondActivity
        recyclerView.adapter = ItemAdapter(items) { item ->
            val intent = Intent(this, SecondActivity::class.java)
            intent.putExtra("itemText", item.text)
            resultLauncher.launch(intent)
        }

    }
}