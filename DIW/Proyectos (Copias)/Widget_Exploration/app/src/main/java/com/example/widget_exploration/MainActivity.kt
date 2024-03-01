package com.example.widget_exploration

import android.content.pm.ActivityInfo
import android.graphics.Color
import android.os.Bundle
import android.view.View
import android.widget.Button
import android.widget.CheckBox
import android.widget.EditText
import android.widget.ImageView
import android.widget.RadioButton
import android.widget.RadioGroup
import android.widget.Switch
import android.widget.TextClock
import android.widget.TextView
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import com.example.widget_exploration.ui.theme.Widget_ExplorationTheme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        requestedOrientation = ActivityInfo.SCREEN_ORIENTATION_LANDSCAPE

        val radio_group = findViewById<RadioGroup>(R.id.radio_group)
        val radio_button_1 = findViewById<RadioButton>(R.id.radio_button_1)
        val radio_button_2 = findViewById<RadioButton>(R.id.radio_button_2)
        val radio_button_3 = findViewById<RadioButton>(R.id.radio_button_3)
        val radio_button_4 = findViewById<RadioButton>(R.id.radio_button_4)

        val user_text = findViewById<EditText>(R.id.user_text)
        val boton_capturar = findViewById<Button>(R.id.boton_capturar)
        val text_clock = findViewById<TextClock>(R.id.text_clock)

        val check_box_1 = findViewById<CheckBox>(R.id.check_box_1)
        val check_box_2 = findViewById<CheckBox>(R.id.check_box_2)
        val check_box_3 = findViewById<CheckBox>(R.id.check_box_3)

        val image_view = findViewById<ImageView>(R.id.image_view)

        val right_switch = findViewById<Switch>(R.id.right_switch)
        val copied_text = findViewById<TextView>(R.id.copied_text)

        // Editar Transparencia
        check_box_1.setOnCheckedChangeListener { view, isChecked ->
            if (isChecked) {
                image_view.alpha = .1f
            } else {
                image_view.alpha = 1f
            }
        }

        // Editar Color
        check_box_2.setOnCheckedChangeListener { view, isChecked ->
            if (isChecked) {
                image_view.setColorFilter(Color.argb(150, 100, 50, 0))
            } else {
                image_view.setColorFilter(Color.argb(0, 0, 0, 0))
            }
        }

        // Editar Tamaño
        check_box_3.setOnCheckedChangeListener { view, isChecked ->
            if (isChecked) {
                image_view.scaleX = 2f
                image_view.scaleY = 2f
            } else {
                image_view.scaleX = 1f
                image_view.scaleY = 1f
            }
        }

        // Cambiar Zona Horaria
        radio_group.setOnCheckedChangeListener { group, checkedId ->

            val radio_button = group.findViewById<View>(checkedId) as RadioButton

            when (radio_button.id) {
                R.id.radio_button_1 -> text_clock.timeZone = "Europe/London"
                R.id.radio_button_2 -> text_clock.timeZone = "CST6CDT"
                R.id.radio_button_3 -> text_clock.timeZone = "America/New_York"
                R.id.radio_button_4 -> text_clock.timeZone = "Europe/Brussels"
            }

        }

        // Capturar y mostrar Texto
        boton_capturar.setOnClickListener {
            copied_text.text = user_text.text
        }

        right_switch.setOnCheckedChangeListener { buttonView, isChecked ->

            if (isChecked) {
                copied_text.visibility = View.VISIBLE
            } else {
                copied_text.visibility = View.INVISIBLE
            }

        }

    }
}