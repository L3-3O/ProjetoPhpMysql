<header style="background:radial-gradient(circle at top, rgba(255,215,0,.15), transparent 45%), linear-gradient(135deg,#000,#111,#000); color:#fff; padding:90px 20px; text-align:center; border-bottom:2px solid #d4af37; position:relative; overflow:hidden;">

    <div style="position:absolute; inset:0; background:repeating-linear-gradient(90deg, transparent 0, transparent 80px, rgba(212,175,55,.05) 81px, transparent 82px); pointer-events:none;"></div>

    <div class="container" style="position:relative; z-index:2;">

        <span style="display:inline-block; padding:8px 18px; border:1px solid #d4af37; border-radius:30px; color:#FFD700; background:rgba(255,215,0,.08); letter-spacing:2px; text-transform:uppercase; font-size:.85rem; box-shadow:0 0 15px rgba(255,215,0,.3); margin-bottom:20px;">
            ⚡ Sistema Inteligente <?php echo databr(); ?> <?php echo horabr(); ?>
        </span>

        <h1 style="
            font-size:3.5rem;
            font-weight:800;
            text-transform:uppercase;
            letter-spacing:3px;
            margin:20px 0;
            color:#FFD700;
            text-shadow:
                0 0 10px rgba(255,215,0,.7),
                0 0 25px rgba(255,215,0,.4),
                0 0 45px rgba(255,215,0,.2);
        ">
            SISTEMA DE CONTROLE DE ESTOQUE
        
            
        </h1>

        <div style="
            width:180px;
            height:3px;
            margin:20px auto 30px;
            background:linear-gradient(to right, transparent, #FFD700, transparent);
            box-shadow:0 0 12px #FFD700;
        "></div>

        <p style="
            font-size:1.2rem;
            color:#d7d7d7;
            max-width:750px;
            margin:0 auto 35px;
            line-height:1.8;
        ">
            Gerencie <span style="color:#FFD700;font-weight:bold;">produtos</span>,
            acompanhe <span style="color:#FFD700;font-weight:bold;">movimentações</span>
            e visualize <span style="color:#FFD700;font-weight:bold;">relatórios inteligentes</span>
            em uma plataforma moderna, segura e eficiente.

            <?= $enc = encrypt_secure("123456",'e') ;?>
            <br>
            <?php echo $dec =encrypt_secure($enc, 'd');?>
        </p>

        <div>

            <a href="#"
               style="
                display:inline-block;
                background:#d4af37;
                color:#000;
                padding:14px 35px;
                margin:5px;
                border-radius:40px;
                text-decoration:none;
                font-weight:bold;
                box-shadow:0 0 20px rgba(255,215,0,.35);
               ">
                📦 Produtos
            </a>

            <a href="#"
               style="
                display:inline-block;
                border:2px solid #d4af37;
                color:#FFD700;
                padding:14px 35px;
                margin:5px;
                border-radius:40px;
                text-decoration:none;
                font-weight:bold;
                background:rgba(255,215,0,.05);
               ">
                📊 Relatórios
            </a>

        </div>

    </div>

</header>