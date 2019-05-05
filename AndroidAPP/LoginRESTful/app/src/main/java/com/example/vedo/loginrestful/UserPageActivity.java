package com.example.vedo.loginrestful;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class UserPageActivity extends AppCompatActivity {

    TextView user_name;
    Button logout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_user_page);

        user_name = (TextView) findViewById(R.id.user_name);
        logout = (Button) findViewById(R.id.logout);

        user_name.setText(Api.username);

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Api.username = "";
                startActivity(new Intent(UserPageActivity.this, MainActivity.class));
            }
        });
    }
}
