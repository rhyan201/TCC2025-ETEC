// Seleciona todos os selects
const selects = document.querySelectorAll('select');

selects.forEach(sel => {
    sel.addEventListener('change', () => {
        atualizarResumo();
        atualizarCompatibilidade();
    });
});

// Atualiza o resumo das peças
function atualizarResumo() {
    document.getElementById('resumo_processador').innerText = document.getElementById('select_processador').value || 'Nenhum';
    document.getElementById('resumo_ram').innerText = document.getElementById('select_ram').value || 'Nenhum';
    document.getElementById('resumo_mobo').innerText = document.getElementById('select_mobo').value || 'Nenhum';
    document.getElementById('resumo_psu').innerText = document.getElementById('select_psu').value || 'Nenhum';
    document.getElementById('resumo_gpu').innerText = document.getElementById('select_gpu').value || 'Nenhum';
    document.getElementById('resumo_ssd').innerText = document.getElementById('select_ssd').value || 'Nenhum';
    document.getElementById('resumo_hd').innerText = document.getElementById('select_hd').value || 'Nenhum';
    document.getElementById('resumo_water').innerText = document.getElementById('select_water').value || 'Nenhum';
    document.getElementById('resumo_air').innerText = document.getElementById('select_air').value || 'Nenhum';
}

// Atualiza compatibilidade de todas as peças
function atualizarCompatibilidade() {
    const processador = document.getElementById('select_processador').selectedOptions[0];
    const chipProcessador = processador?.getAttribute('data-chipset') || '';
    const ddrProcessador = processador?.getAttribute('data-ddr') || '';

    // Placa-mãe compatível com processador
    const selectMobo = document.getElementById('select_mobo');
    Array.from(selectMobo.options).forEach(option => {
        const chipMobo = option.getAttribute('data-chipset');
        const ddrMobo = option.getAttribute('data-ddr');
        option.disabled = (chipProcessador && ddrProcessador) 
            ? (chipMobo !== chipProcessador || ddrMobo !== ddrProcessador) 
            : false;
    });

    // RAM compatível com processador e placa-mãe
    const selectRam = document.getElementById('select_ram');
    Array.from(selectRam.options).forEach(option => {
        const ddrRam = option.getAttribute('data-ddr');
        option.disabled = (ddrProcessador) ? (ddrRam !== ddrProcessador) : false;
    });

    // Coolers compatíveis com processador e placa-mãe
    const processadorSoquete = chipProcessador;
    const moboSoquete = chipProcessador; // assumindo mesmo chipset como base
    const selectWater = document.getElementById('select_water');
    const selectAir = document.getElementById('select_air');

    [selectWater, selectAir].forEach(select => {
        Array.from(select.options).forEach(option => {
            const soquetes = option.getAttribute('data-soquetes')?.split(',') || [];
            const compativel = soquetes.includes(processadorSoquete) || soquetes.includes(moboSoquete);
            option.disabled = !compativel;
        });
    });
}
