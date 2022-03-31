<div class="mb-5">
    <h5 class="fw-bold">Major components explanation</h5>
    <ul class="list-group list-group-flush px-auto mx-auto">
        <li class="list-group-item"><em>Program counter (PC)</em>: A 32-bit register that holds the address of the current instruction,
        its job is to send that instruction address to the Instruction Memory in the instruction fetching stage.</li>
        <li class="list-group-item"><em>Memory</em>: As for memory, this implementation employs the Havard architecture, which means it
        has separate storages and signal pathways for instruction and data. <br>
        <div class="mx-5">
            <small>Instruction Memory: It has a single read port (we ignore the case of writing into the
            instruction memory when loading the program for simplicity), takes a 32-bit instruction address
            input and puts the 32-bit data from that address onto the read data output.</small> <br>
            <small> Data Memory: This unit is used to read from or write to the memory. It contains separate
            read and write controls (only one of them can be asserted on any given clock), can take inputs for
            address and/or write data and output the read result.</small>
        </div>
        </li>
        <li class="list-group-item"><em>Register file</em>: A collection of registers in which any register can be
        read or written to by specifying the number of the register in the file.  </li>
        <li class="list-group-item"><em>Arithmetic-Logical Unit (ALU)</em>: Most instructions (except jump) use ALU
        after reading the registers, either for address calculation, operation execution, or comparison.  </li>
        <li class="list-group-item"><em>Control units</em>: There are two control units, namely the ALU Control unit
        and the Main Control unit. Generally, both are involved in the instruction decode stage and generate
        signals to determine the operation of specific segments in the datapath.<br>
        <div class="mx-5">
            <small> Main Control unit: This unit decodes the first six bits from each instruction and generate
            several control signals, including the read and write signals for register file / memory, ALU
            operation code (opcode) to be sent to ALU Control unit, branch target address computation, signals
            to set MUXs... </small> <br>
            <small> ALU Control unit: Signals from this unit are generated based on the opcode and funct
            fields of each instruction. As its name implies, these signals specify what operation the ALU
            should perform. </small>
        </div>
        </li>
    </ul>
</div>
